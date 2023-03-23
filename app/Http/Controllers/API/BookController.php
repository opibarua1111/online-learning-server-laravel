<?php

namespace App\Http\Controllers\API;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    //
    public function index(){
        $books = Book::all();
       return [
         'success' => 'success message',
         $books
       ];
    }
    public function store(Request $request)
    {
        Book::create($request->all());
        return [
         'message' => 'Book Added Successfully'
       ];
    }
    public function singleBook($id)
    {
        $book = Book::find($id);
        return [
         'success' => 'success message',
         $book
       ];
    }
    public function delete($id)
    {
        $books = Book::find($id);
        $books->delete();
        return [
         'message' => 'Book Delete Successfully'
       ];
    }
    public function update(Request $request)
    {
        $book = Book::find($request->id);
        $book->name = $request->name;
        $book->writer = $request->writer;
        $book->description = $request->description;
        $book->status = $request->status;
        $book->update();
        return [
         'message' => 'Book Update Successfully'
       ];
    }
}