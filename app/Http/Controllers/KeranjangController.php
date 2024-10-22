<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
    // Menampilkan halaman checkout dengan semua item dari keranjang
    public function checkout()
    {
        // Ambil data keranjang dari session
        $keranjang = session()->get('keranjang', []);

        // Hitung total harga
        $total = array_sum(array_map(function ($item) {
            return $item['harga'] * $item['jumlah'];
        }, $keranjang));

        // Mendapatkan data user yang sedang login
        $user = Auth::user();

        // Menyimpan data pesanan ke sesi
        $order = [
            'items' => $keranjang, // Simpan data keranjang sebagai items
            'total' => $total,
            'nama_pembeli' => $user->name,
            'telepon' => $user->telepon,
        ];

        // Menyimpan data pesanan ke session
        session()->put('order', $order);

        // Tampilkan halaman checkout dengan data pesanan
        return view('products.checkout', compact('order'));
    }


    // Menangani checkout langsung dari halaman produk
    public function checkoutLangsung(Request $request)
    {
        // Validasi input produk, ukuran, dan jumlah
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'size' => 'required|string',
            'quantity' => 'required|integer|min:1',
        ]);

        // Mendapatkan data produk berdasarkan ID
        $product = \App\Models\Product::find($request->product_id);

        // Mendapatkan data user yang sedang login
        $user = Auth::user();

        // Membuat data pesanan
        $order = [
            'items' => [
                [
                    'id' => $product->id,
                    'nama' => $product->nama_product,
                    'harga' => $product->harga,
                    'ukuran' => $request->size,
                    'jumlah' => $request->quantity,
                    'gambar' => $product->gambar,
                ]
            ],
            'total' => $product->harga * $request->quantity,
            'nama_pembeli' => $user->name,
            'telepon' => $user->telepon,
        ];

        // Menyimpan data pesanan ke session
        session()->put('order', $order);

        // Redirect ke halaman checkout
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
        // Ambil data pesanan dari sesi
        $order = session()->get('order');

        // Jika tidak ada data pesanan di sesi 'order', ambil data keranjang
        if (!$order) {
            // Ambil data keranjang dari session
            $keranjang = session()->get('keranjang', []);

            

            // Dapatkan data user yang sedang login
            $user = Auth::user();

            // Siapkan data pesanan berdasarkan data keranjang
            $order = [
                'items' => $keranjang,
                'total' => array_sum(array_map(function ($item) {
                    return $item['harga'] * $item['jumlah'];
                }, $keranjang)),
                'nama_pembeli' => $user->name,
                'telepon' => $user->telepon,
            ];

            // Simpan data pesanan ke session
            session()->put('order', $order);
        }

        // Simpan transaksi ke database (harus dilakukan setelah order di-set)
        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'total_harga' => $order['total'],
            'status' => 'pending', 
        ]);
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $order['total'],
            )
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $transaction->snap_token=$snapToken;
        $transaction->save();


        // Redirect ke halaman url
        return view('products.pembayaran', compact('transaction', 'order'));

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
