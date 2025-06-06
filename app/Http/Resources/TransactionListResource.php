<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $list = $this->resource;

        return [
            'id'                => $list->id,
            'nama_buku'         => $list->book->judul,
            'nama_pembeli'      => $list->user->name,
            'tanggal_pinjam'    => $list->tanggal_pinjam,
            'tanggal_kembali'   => $list->tanggal_kembali
        ];
    }
}
