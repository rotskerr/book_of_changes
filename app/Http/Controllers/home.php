<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class home extends Controller
{
    public function index()
    {
        $books = \App\Models\Book::all();
        return view('welcome', compact('books'));
    }
}
