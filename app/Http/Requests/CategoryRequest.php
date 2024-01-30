<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:100'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Campo name é obrigatório',
            'name.max' => 'Tamanho máximo do name é 100',
        ];
    }
}
