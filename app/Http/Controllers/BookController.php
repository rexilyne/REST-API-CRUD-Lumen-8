<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller {
    // create book
    public function create(Request $request) {
        $this->validate($request, [
            "name" => "required|unique:book",
            "price" => "required",
            "status" => "required"
        ]);

        $data = $request->all();
        $book = Book::create($data);

        return response()->json($book);
    }

    // get book
    public function index() {
        $book = Book::all();
        return response()->json($book);
    }
}
