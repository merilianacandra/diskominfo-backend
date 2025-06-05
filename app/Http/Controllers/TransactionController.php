<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionController extends Controller
{
    public function index()
    {
        $transaction = Transaction::get();
        return JsonResource::collection($transaction);
    }

    public function borrow(Request $request)
    {
        $validated = $request->validate([
            'buku_id' => 'required',
            'user_id' => 'required',
            'tanggal_pinjam' => 'required',
        ]);

        $transaction = Transaction::create($validated);

        $transaction->book()->update([
            'is_available' => false
        ]);

        return JsonResource::make($transaction);
    }

    public function return(Request $request, Transaction $transaction)
    {
        $validated = $request->validate([
            'buku_id' => 'required',
            'user_id' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
        ]);

        $transaction->update($validated);

        $transaction->book()->update([
            'is_available' => true
        ]);

        return JsonResource::make($transaction);
    }
}
