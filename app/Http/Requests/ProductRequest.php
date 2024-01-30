<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'name' => 'required|max:100',
            'description' => 'required|max:255',
            'price' => 'required|numeric|min:0.01',
            'expiration_date' => 'required|date|after_or_equal:today',
            'image' => 'required',
            'category_id' => 'required|integer|min:1',
        ];

        // Add rules for update (exclude unique fields for the current record)
        if ($this->method() === 'PUT' || $this->method() === 'PATCH') {
            $rules['name'] = 'required|max:100|unique:products,name,' . $this->route('product');
            $rules['description'] = 'required|max:255';
            $rules['price'] = 'required|numeric|min:0.01';
            $rules['expiration_date'] = 'required|date|after_or_equal:today';
            $rules['image'] = 'required';
            $rules['category_id'] = 'required|integer|min:1';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'name.max' => 'O tamanho máximo do nome é 100 caracteres',
            'name.unique' => 'Este nome já está em uso por outro produto',

            'description.required' => 'O campo descrição é obrigatório',
            'description.max' => 'O tamanho máximo da descrição é 255 caracteres',

            'price.required' => 'O campo preço é obrigatório',
            'price.numeric' => 'O campo preço deve ser um número',
            'price.min' => 'O campo preço deve ser no mínimo 0.01',

            'expiration_date.required' => 'O campo data de expiração é obrigatório',
            'expiration_date.date' => 'O campo data de expiração deve ser uma data válida',
            'expiration_date.after_or_equal' => 'A data de expiração deve ser igual ou posterior à data atual',

            'image.required' => 'O campo imagem é obrigatório',

            'category_id.required' => 'O campo categoria é obrigatório',
            'category_id.integer' => 'O campo categoria deve ser um número inteiro',
            'category_id.min' => 'O campo categoria deve ser no mínimo 1',
        ];
    }
}
