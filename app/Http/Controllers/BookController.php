<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function getAll()
    {
        $books = Book::selectRaw("TRIM(BOTH '\"' FROM text) as text")->get();
        $filteredBooks = $this->filterBooks($books);
        return response()->json($filteredBooks, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function getByNumber($number)
    {
        $book = Book::where('number', '=', $number)->selectRaw("TRIM(BOTH '\"' FROM text) as text")->first();
        $filteredBook = $this->filterBook($book);
        return response()->json($filteredBook, 200, [], JSON_UNESCAPED_UNICODE);
    }

    private function filterBooks($books)
    {
        foreach ($books as $book) {
            $book->text = $this->filterText($book->text);
        }
        return $books;
    }

    private function filterBook($book)
    {
        $book->text = $this->filterText($book->text);
        return $book;
    }

    private function filterText($text)
    {
        $filteredText = str_replace(['{', 'text', '}','"', ':',  "\r", "\n"], '', $text);
        return $filteredText;
    }

}
