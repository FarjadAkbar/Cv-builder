<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CertificateRequest extends FormRequest
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
            'certificate_name' => ['required', 'string', 'max:255'],
            'about' => ['required', 'string', 'max:255'],
            'year' => ['required', 'integer'],
        ];
    }

    public function messages(){
        return [
            'certificate_name.required' =>":attribute must not be empty",
            'certificate_name.string' =>":attribute should be a string",
            'about.required' =>":attribute must not be empty",
            'about.string' =>":attribute should be a string",
            'year.required' =>":attribute must not be empty",
            'year.integer' =>":attribute should be an integer",
        ];
    }
}
