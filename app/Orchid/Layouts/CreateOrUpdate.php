<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layouts\Rows;

class CreateOrUpdate extends Rows
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields(): iterable
    {
        return [
            Input::make('book.id')->type('hidden'),
            TextArea::make('book.text')->required()->title('Текст')->help('Введіть опис'),
            CheckBox::make('book.key_1')
                ->sendTrueOrFalse()
                ->title('Ключ - 1'),
            CheckBox::make('book.key_2')
                ->sendTrueOrFalse()
                ->title('Ключ - 2'),
            CheckBox::make('book.key_3')
                ->sendTrueOrFalse()
                ->title('Ключ - 3'),
            CheckBox::make('book.key_4')
                ->sendTrueOrFalse()
                ->title('Ключ - 4'),
            CheckBox::make('book.key_5')
                ->sendTrueOrFalse()
                ->title('Ключ - 5'),
            CheckBox::make('book.key_6')
                ->sendTrueOrFalse()
                ->title('Ключ - 6'),
        ];
    }
}
