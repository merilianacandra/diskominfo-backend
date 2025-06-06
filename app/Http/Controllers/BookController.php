<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use stdClass;

class BookController extends Controller
{
    public function index()
    {
        // $books = Book::get();
        // return view('index', ['books'=>$books]);

        // GET /users?filter[name]=john&filter[email]=gmail

        $books = QueryBuilder::for(Book::class)
            ->allowedFilters([AllowedFilter::exact('is_available')])
            ->get();

        // $users will contain all users with "john" in their name AND "gmail" in their email address
        return JsonResource::collection($books); // collection for more than one data -> json
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

    public function destroy(Book $book)
    {
        $book->delete();
        // Book::query()->where('id', '=', $id)->first()->delete();
        return response()->json(['data' => new stdClass]);
    }

    public function updateStatus(Request $request, Book $book)
    {
        $validated = $request->validate([
            'judul' => 'sometimes|required',
            'penulis' => 'sometimes|required',
            'is_available' => 'sometimes|required|boolean',
        ]);

        $book->update($validated);
        return JsonResource::make($book);
    }
}
