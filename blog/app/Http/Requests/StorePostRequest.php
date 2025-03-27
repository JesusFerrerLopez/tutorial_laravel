<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:3|max:255', 
            'content' => 'required',
            'slug' => ['required', 'min:3', 'max:255'],
            'category' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'El :attribute es obligatorio',
            'title.min' => 'El título debe tener al menos 3 caracteres',
            'title.max' => 'El título no puede tener más de 255 caracteres',
            'content.required' => 'El contenido es obligatorio',
            'slug.required' => 'El slug es obligatorio',
            'slug.min' => 'El slug debe tener al menos 3 caracteres',
            'slug.max' => 'El slug no puede tener más de 255 caracteres',
            'category.required' => 'La categoría es obligatoria'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'título',
            'content' => 'contenido',
            'slug' => 'slug',
            'category' => 'categoría'
        ];
    }
}
