<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
 Route::get('/books', [\App\Http\Controllers\BookController::class, 'getAll'])->name('books');
 Route::get('/book/{number}', [\App\Http\Controllers\BookController::class, 'getByNumber'])->name('book');
 Route::get('/ips/{ips}', [\App\Http\Controllers\IpsController::class, 'index'])->name('ips');

