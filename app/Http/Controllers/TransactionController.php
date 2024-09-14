<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // Menampilkan daftar transaksi
    public function index()
    {
        $transactions = Transaction::with('user')->get(); // Mengambil semua transaksi beserta usernya
        return view('admin.transactions.index', compact('transactions'));
    }

    // Menampilkan detail transaksi berdasarkan ID
    public function show($id)
    {
        $transaction = Transaction::with('user')->findOrFail($id);
        return view('admin.transactions.show', compact('transaction'));
    }

    // Update status transaksi (misalnya menyelesaikan transaksi)
    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->update([
            'status' => $request->status
        ]);

        return redirect()->route('admin.transactions.index')->with('success', 'Transaksi diperbarui.');
    }

    // Menghapus transaksi
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->route('admin.transactions.index')->with('success', 'Transaksi dihapus.');
    }

    public function updateStatus(Request $request, Transaction $transaction)
    {
        // Validasi status
        $request->validate([
            'status' => 'required|string|in:pending,completed,cancelled',
        ]);

        // Update status transaksi
        $transaction->status = $request->input('status');
        $transaction->save();

        // Redirect atau response
        return redirect()->route('admin.transactions.index')->with('success', 'Status transaksi berhasil diperbarui.');
    }
}
