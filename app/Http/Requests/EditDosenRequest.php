<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditDosenRequest extends FormRequest
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
            'role' => 'required',
            'name' => 'required', 
            'fakultas' => 'required',
            'phone' => 'nullable',
            'id_prodi' => 'nullable',
            'username' => 'unique:users,username,'.$this->id.',id',
            'email' => 'unique:users,email,'.$this->id.',id'
        ];
    }
}
