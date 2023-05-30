<?php

namespace App\Orchid\Layouts\Book;

use App\Models\Book;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class BookTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'books';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('text', 'Опис')->cantHide()
                ->sort()
                ->filter(TD::FILTER_TEXT)
                ->width(400),
            TD::make('number', 'Номер')->sort()
                ->filter(TD::FILTER_TEXT),
            TD::make('key_1', 'Ключ 1')->defaultHidden(),
            TD::make('key_2', 'Ключ 2')->defaultHidden(),
            TD::make('key_3', 'Ключ 3')->defaultHidden(),
            TD::make('key_4', 'Ключ 4')->defaultHidden(),
            TD::make('key_5', 'Ключ 5')->defaultHidden(),
            TD::make('key_6', 'Ключ 6')->defaultHidden(),
            TD::make('created_at', 'Дата створення')->defaultHidden(),
            TD::make('updated_at', 'Дата оновлення (редагування)')->defaultHidden(),
            TD::make('action','')->render(function (Book $book) {
                return ModalToggle::make('Редагувати')
                    ->modal('edit')
                    ->method('createOrUpdate')
                    ->asyncParameters([
                        'book' => $book->id
                    ]);
            })->alignRight()->cantHide(),
            TD::make('delete','')->render( function (Book $book){
                return  ModalToggle::make('Видалити')
                    ->modal('delete')
                    ->method('delete')
                    ->asyncParameters([
                        'book' => $book->id
                    ]);
            })->alignRight()->cantHide()->width(100),
        ];
    }
}
