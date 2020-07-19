<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function getAuthors()
    {
        $authors = Author::paginate(5);

        return response()->json(compact('authors'),200);
    }

    public function getBooks()
    {
        $books = Book::paginate(10);

        return response()->json(compact('books'),200);
    }

    public function booksByAuthor($id)
    {
        $author = Book::where('author_id', '=', $id)
            ->paginate(3);

        return response()->json(compact('author'),200);
    }
}
