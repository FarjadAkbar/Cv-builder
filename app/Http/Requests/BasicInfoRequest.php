<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BasicInfoRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:basic_information'],
            'profession' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'website' => ['nullable', 'url'],
            'post_code' => ['nullable', 'integer'],
            'phone' => ['required', 'string', 'max:18'],
        ];
    }

    public function messages(){
        return [
            'first_name.required' =>":attribute must not be empty",
            'first_name.string' =>":attribute should be a string",
            'last_name.required' =>":attribute must not be empty",
            'last_name.string' =>":attribute should be a string",
            'profession.required' =>":attribute must not be empty",
            'address.required' =>":attribute must not be empty",
            'email.required' =>":attribute must not be empty",
            'email.email' =>"please enter a valid :attribute",
            'website.URL' =>"enter a valid :attribute",
            'post_code.integer' =>"enter valid :attribute",
            'phone.required' =>":attribute Must not be empty",
            'phone.integer' =>"enter valid :attribute",
        ];
    }
}
