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
            'status' => true
        ]);

        return JsonResource::make($transaction);
    }
}
