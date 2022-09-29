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

    // get book by id
    public function show($id) {
        $book = Book::find($id);

        if(!$book) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        return response()->json($book);
    }

    // update book
    public function update(Request $request, $id) {
        $book = Book::find($id);

        if(!$book) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        $this->validate($request, [
            "name" => "required|unique:book",
            "price" => "required",
            "status" => "required"
        ]);

        $data = $request->all();
        // menggunakan property eloquent fillable
        $book->fill($data);
        $book->save();

        return response()->json($book);
    }

    // delete book
    public function destroy($id) {
        $book = Book::find($id);

        if(!$book) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        $book->delete();

        return response()->json(['message' => 'Data deleted successfully'], 200);
    }
}
