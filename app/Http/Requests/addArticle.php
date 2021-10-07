<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addArticle extends FormRequest
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
            'articleId' => 'required',
            'articleTitle' => 'required|max:200',
            'articleContent' => 'required|max:200000',
            'articleVisibility' => 'required',
            'articleDateFrom' => 'required|date|after:yesterday',
            'articleSubsite' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'articleTitle.required' => 'Pole "tytuł" nie może być puste.',
            'articleTitle.max' => 'Tytuł nie może zawierać więcej niż :max znaków.',
            'articleContent.required' => 'Pole z treścią jest wymagane.',
            'articleContent.max' => 'Treść nie może zawierać więcej niż 200 000 znaków.',
            'articleDateFrom.date' => 'Nieprawidłowa data.',
            'articleDateFrom.after' => 'Nie można zaplanować publikacji z datą wcześniejszą niż dzisiaj.'


        ];
    }
}
