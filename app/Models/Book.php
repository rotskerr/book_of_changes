<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Book extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;
    protected $allowedSorts = [
        'number',
        'text',

    ];
    protected $guarded = ['id'];

    protected $fillable = [
        'text',
        'number',
        'key_1',
        'key_2',
        'key_3',
        'key_4',
        'key_5',
        'key_6',
    ];
}
