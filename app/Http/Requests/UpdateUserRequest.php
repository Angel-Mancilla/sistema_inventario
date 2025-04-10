<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateUserRequest extends FormRequest
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
            'name' => 'required',
            // 'email' => 'required|unique:users',
            'email' => ['required','email',Rule::unique('users')->ignore($this->user->id),],
            'role_id' => 'required|integer|exists:roles,id',
            'password' => 'nullable|confirmed|max:6'
        ];
    }
}
