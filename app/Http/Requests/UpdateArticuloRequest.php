<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticuloRequest extends FormRequest
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
            'descripcion' => 'required|string|not_regex:/<[^>]*>/',
            'categoria_id' => 'required|integer|exists:categorias,id',
            'grupo_id' => 'required|integer|exists:grupos,id',
            'stock' => 'required|integer|min:0',
            'estado' => 'required|boolean'
        ];
    }
}
