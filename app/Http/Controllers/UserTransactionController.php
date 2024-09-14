<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserTransactionController extends Controller
{
    public function index()
    {
        // Ambil transaksi pengguna yang sedang login
        $transactions = Transaction::where('user_id', Auth::id())->get();

        // Tampilkan riwayat transaksi
        return view('admin.user.riwayat', compact('transactions'));
    }
}
