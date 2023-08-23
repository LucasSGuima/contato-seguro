<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RecordRequest extends FormRequest
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
            'deleted' => 'nullable|in:0,1',
            'type' => 'nullable|in:duvida,problema,sugestao',
            'order_by' => 'nullable|in:id,type,message,is_identified,whistleblower_name,whistleblower_birth,created_at,deleted',
            'offset' => 'nullable|numeric',
            'limit' => [
                'nullable',
                'numeric',
                Rule::requiredIf(function () {
                    return !empty(request()->input('offset'));
                }),
            ],
        ];
    }

    public function messages()
    {
        return [
            'deleted.nullable' => 'O campo deleted deve ser nulo ou ter um valor válido (0 ou 1).',
            'deleted.in' => 'O campo deleted deve ser 0 ou 1.',
            'type.nullable' => 'O campo type deve ser nulo ou ter um valor válido (duvida, problema, sugestao).',
            'type.in' => 'O campo type deve ser duvida, problema ou sugestao.',
            'order_by.nullable' => 'O campo order_by deve ser nulo ou ter um valor válido (id, type, message, is_identified, whistleblower_name, whistleblower_birth, created_at, deleted).',
            'order_by.in' => 'O campo order_by deve ter um valor válido (id, type, message, is_identified, whistleblower_name, whistleblower_birth, created_at, deleted).',
            'offset.nullable' => 'O campo offset deve ser nulo ou um valor numérico.',
            'offset.numeric' => 'O campo offset deve ser um valor numérico.',
            'limit.nullable' => 'O campo limit deve ser nulo ou um valor numérico.',
            'limit.numeric' => 'O campo limit deve ser um valor numérico.',
            'limit.required' => 'Se o campo offset estiver preenchido, é necessário também preencher o campo limit.',
        ];
    }
}
