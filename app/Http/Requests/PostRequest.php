<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => ['required', 'min:3', 'max:50'],
            'message' => ['required', 'min:3', 'max:1000'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'O Título é obrigatório!',
            'message.required' => 'A mensagem é obrigatória!',
            'title.min' => 'O título deve ter no mínimo 3 caracteres!',
            'title.max' => 'O título deve ter no máximo 50 caracteres!',
            'message.min' => 'A mensagem deve ter no mínimo 3 caracteres!',
            'message.max' => 'A mensagem deve ter no máximo 1000 caracteres!'
        ];
    }
}
