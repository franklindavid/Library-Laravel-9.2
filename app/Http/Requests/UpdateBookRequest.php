<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBookRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'isbn' => ['required', Rule::unique('books')->ignore($this->book)],
            'name' => 'required|max:255',
            'author' => 'required|max:255|regex:[^[a-zA-Z]+(\s*[a-zA-Z]*)*[a-zA-Z]+$]',
            'category' => 'required|max:255|numeric',
            'publication_date' => 'required|max:255|date',
            'copies' => 'required|max:255|numeric',
        ];
    }
}
