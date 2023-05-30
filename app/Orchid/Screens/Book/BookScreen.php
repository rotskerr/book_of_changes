<?php

namespace App\Orchid\Screens\Book;

use App\Http\Requests\BookRequest;
use App\Http\Requests\DeleteBookRequest;
use App\Models\Book;
use App\Orchid\Layouts\Book\BookTable;
use App\Orchid\Layouts\CreateOrUpdate;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class BookScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'books' => Book::paginate(10),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Книга змін';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Створити')->modal('create')->method('createOrUpdate'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            BookTable::class,
            Layout::modal('create', CreateOrUpdate::class)->title('Створення')->applyButton('Створити'),
            Layout::modal('edit', CreateOrUpdate::class)->title('Редагування')->applyButton('Зберегти')->async('asyncGet'),
            Layout::modal('delete', Layout::rows([
                Input::make('book.id')->type('hidden'),
                TextArea::make('book.text')->readonly(),
                Input::make('book.number')->readonly(),
                Input::make('book.key_1')->readonly(),
                Input::make('book.key_2')->readonly(),
                Input::make('book.key_3')->readonly(),
                Input::make('book.key_4')->readonly(),
                Input::make('book.key_5')->readonly(),
                Input::make('book.key_6')->readonly(),
            ]))->title('Видалення')->applyButton('Видалити')->async('asyncGet'),
        ];
    }

    public function asyncGet(Book $book): array
    {
        return [
            'book' => $book,
        ];
    }

    public function createOrUpdate(BookRequest $request): void
    {
//        dd($request->input('book.number') );
        $bookId = $request->input('book.id');

        $book = [
            'id' => $bookId,
            'number' => $request->input('book.number'),
            'text' => $request->input('book.text'),
        ];

        for($i = 1;$i<7;$i++ ){
            $key = '';
            if($request->input('book.key_'.$i)) {
                $key = true;
            }else{
                $key = false;
            }
            $book += ['key_'.$i => $key];
        }
//  dd($book);
        Book::updateOrCreate([
            'id'=> $bookId
        ], $book);

        is_null($bookId) ? Toast::info('Запис успішно створено') : Toast::info('Запис успішно відредаговано');
    }

    public function delete(DeleteBookRequest $request){
        $bookId = $request->input('book.id');
        $book = Book::find($bookId);
        $book->delete();
        Toast::info('Запис успішно видалено');
    }
}
