<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    // Menambah produk ke dalam keranjang
    public function tambah(Request $request)
    {
        // Validasi input
        $request->validate([
            'size' => 'required',
            'quantity' => 'required|integer|min:1',
        ]);

        // Mendapatkan data produk
        $product = \App\Models\Product::find($request->product_id);

        // Data keranjang (disimpan di session)
        $keranjang = session()->get('keranjang', []);

        // Buat item baru di keranjang
        $item = [
            'id' => $product->id,
            'nama' => $product->nama_product,
            'harga' => $product->harga,
            'ukuran' => $request->size,
            'jumlah' => $request->quantity,
            'gambar' => $product->gambar
        ];

        // Tambah item ke dalam keranjang
        $keranjang[] = $item;

        // Simpan keranjang ke session
        session()->put('keranjang', $keranjang);

        // Set pesan sukses ke session
        $message = "Produk '{$product->nama_product}' ukuran '{$request->size}' berhasil ditambahkan ke keranjang!";
        session()->flash('success', $message);

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    // Menampilkan halaman checkout
    public function keranjang()
    {
        // Ambil data keranjang dari session
        $keranjang = session()->get('keranjang', []);

        // Hitung total harga
        $total = array_sum(array_column($keranjang, 'harga'));

        // Tampilkan halaman keranjang dengan data keranjang dan total
        return view('products.keranjang', compact('keranjang', 'total'));
    }
    public function checkout()
    {
        // Ambil data keranjang dari session
        $keranjang = session()->get('keranjang', []);

        // Hitung total harga
        $total = array_sum(array_column($keranjang, 'harga'));

        // Tampilkan halaman checkout dengan data keranjang dan total
        return view('products.checkout', compact('keranjang', 'total'));
    }
    public function checkoutLangsung(Request $request)
    {
        // Validasi input
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'size' => 'required|string',
            'quantity' => 'required|integer|min:1',
        ]);

        // Mendapatkan data produk
        $product = \App\Models\Product::find($request->product_id);

        // Membuat data pesanan
        $order = [
            'id' => $product->id,
            'nama' => $product->nama_product,
            'harga' => $product->harga,
            'ukuran' => $request->size,
            'jumlah' => $request->quantity,
            'total' => $product->harga * $request->quantity,
        ];

        // Menyimpan data pesanan ke session
        session()->put('order', $order);


        // Redirect ke halaman checkout dengan data pesanan
        return redirect()->route('checkout.langsung');
    }

    public function showCheckout()
    {
        // Ambil data pesanan dari session
        $order = session()->get('order');

        // Pastikan data pesanan ada di session
        if (!$order) {
            return redirect('/')->with('error', 'Data pesanan tidak ditemukan.');
        }

        // Tampilkan halaman checkout dengan data pesanan
        return view('products.checkout', compact('order'));
    }


    public function prosesCheckout(Request $request)
    {
        // Proses pembayaran atau penyimpanan pesanan ke database
        // ...


        // Redirect ke halaman sukses atau beranda
        return redirect('/checkout/proses')->with('success', 'Checkout berhasil!');
    }
    public function hapus($id)
    {
        // Ambil data keranjang dari session
        $keranjang = session()->get('keranjang', []);

        // Hapus item berdasarkan ID
        $keranjang = array_filter($keranjang, function ($item) use ($id) {
            return $item['id'] != $id;
        });

        // Simpan kembali keranjang ke session
        session()->put('keranjang', $keranjang);

        // Redirect ke halaman keranjang dengan pesan sukses
        return redirect()->route('keranjang.index')->with('success', 'Item berhasil dihapus dari keranjang.');
    }
    public function index()
    {
        // Ambil data keranjang dari session
        $keranjang = session()->get('keranjang', []);

        // Hitung jumlah total item dalam keranjang
        $jumlahItem = array_sum(array_column($keranjang, 'jumlah'));

        // Hitung total harga
        $total = array_sum(array_map(function ($item) {
            return $item['harga'] * $item['jumlah'];
        }, $keranjang));
        return view('products.keranjang', compact('keranjang', 'jumlahItem', 'total'));
    }
}
