<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller {
    public function create(Request $request) {
        $data = $request->all();
        $book = Book::create($data);

        return response()->json($book);
    }
}
