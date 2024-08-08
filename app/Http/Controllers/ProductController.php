<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function index()
    {

        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }


    public function create()
    {
        return view('admin.products.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_product' => 'required',
            'harga' => 'required',
            'ukuran' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image',
        ]);

        // Jika gambar diunggah, proses penyimpanan file
        if ($request->hasFile('gambar')) {
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('images'), $imageName);
        }

        // Simpan data produk ke database
        Product::create([
            'nama_product' => $request['nama_product'],
            'harga' => $request['harga'],
            'ukuran' => $request['ukuran'],
            'deskripsi' => $request['deskripsi'],
            'gambar' => $imageName ?? null, // Menyimpan nama file gambar jika ada
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }
    public function show($id)
    {
        return view('products.show', compact('products'));
    }

    public function edit($id)
    {
        // Ambil produk berdasarkan ID, pastikan ini adalah objek, bukan koleksi
        $product = Product::findOrFail($id);;
        return view('admin.products.edit', compact('product'));
    }


    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nama_product' => 'required',
            'harga' => 'required',
            'ukuran' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'image',
        ]);
        if ($request->hasFile('gambar')) {
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('images'), $imageName);
            $product->gambar = $imageName;
        }
        $product->update([
            'nama_product' => $request['nama_product'],
            'harga' => $request['harga'],
            'ukuran' => $request['ukuran'],
            'deskripsi' => $request['deskripsi'],
            'gambar' => $product->gambar,
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }


    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
