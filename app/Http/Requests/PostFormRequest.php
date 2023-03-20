<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required','string'],
            'text' => ['required','string'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Поле «Заголовок» є обов`язковим',
            'title.string' => 'Поле «Заголовок» має бути текстовим',
            'text.required' => 'Поле «Текст» є обов`язковим',
            'text.string' => 'Поле «Текст» має бути текстовим',
        ];
    }
}
