<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MahasiswaUpdateRequest extends FormRequest
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
            'id_prodi' => 'required',
            'id_angkatan' => 'required',
            'name' => 'required',
            'username' => 'unique:users,username,'.$this->id.',id',
            'email' => 'unique:users,email,'.$this->id.',id'
        ];
    }
}
