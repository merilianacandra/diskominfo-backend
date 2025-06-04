<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use stdClass;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::get();
        return JsonResource::collection($books); // collection for more than one data -> json
        // return view('index', ['books'=>$books]);
    }

    //(Request $request) => only need if FE sent the payload
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'is_available' => 'required',
        ]);

        $book = Book::create($validated);
        return JsonResource::make($book); // make for one data -> json
        
    }

    public function update(Request $request, Book $book)
    {        
        $validated = $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'is_available' => 'required',
        ]);

        $book->update($validated);
        return JsonResource::make($book);
    }

    public function destroy(int $id)
    {
        Book::query()->where('id', '=', $id)->first()->delete();
        return response()->json(['data' => new stdClass]);
    }
}
