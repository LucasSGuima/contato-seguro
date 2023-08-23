<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecordStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'type' => 'required|in:duvida,problema,sugestao',
            'message' => 'required|string',
            'is_identified' => 'required|boolean',
            'whistleblower_name' => 'nullable|string',
            'whistleblower_birth' => 'nullable|date',
            'created_at' => 'required|date',
            'deleted' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'type.required' => 'O campo tipo é obrigatório.',
            'type.in' => 'O valor do campo tipo deve ser duvida, problema ou sugestao.',
            'message.required' => 'O campo mensagem é obrigatório.',
            'message.string' => 'O campo mensagem deve ser uma string.',
            'is_identified.required' => 'O campo is_identified é obrigatório.',
            'is_identified.boolean' => 'O campo is_identified deve ser verdadeiro ou falso.',
            'whistleblower_name.string' => 'O campo whistleblower_name deve ser uma string.',
            'whistleblower_birth.date' => 'O campo whistleblower_birth deve ser uma data válida.',
            'created_at.required' => 'O campo created_at é obrigatório.',
            'created_at.date' => 'O campo created_at deve ser uma data válida.',
            'deleted.required' => 'O campo deleted é obrigatório.',
            'deleted.boolean' => 'O campo deleted deve ser verdadeiro ou falso.',
        ];
    }
}
