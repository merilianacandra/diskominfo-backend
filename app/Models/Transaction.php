<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $fillable = [
        'buku_id',
        'user_id',
        'tanggal_pinjam',
        'tanggal_kembali'
    ];

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class, 'buku_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
