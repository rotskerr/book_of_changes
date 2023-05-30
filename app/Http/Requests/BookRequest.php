<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'book.number' => ['required'],
            'book.text' => ['required'],
            'book.key_1' => ['boolean'],
            'book.key_2' => ['boolean'],
            'book.key_3' => ['boolean'],
            'book.key_4' => ['boolean'],
            'book.key_5' => ['boolean'],
            'book.key_6' => ['boolean'],
        ];
    }
}
