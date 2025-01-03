<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequest extends FormRequest
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
            'loginEmail' => 'required|email',
            'loginPassword' => 'required|min:6',
        ];
    }

    /**
     * Custom error messages for validation failures.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'loginEmail.required' => 'The email field is required.',
            'loginEmail.email' => 'Please provide a valid email address.',
            'loginPassword.required' => 'The password field is required.',
            'loginPassword.min' => 'The password must be at least 6 characters long.',
        ];
    }

     /**
     * Handle a failed validation attempt.
     *
     * @param \Illuminate\Contracts\Validation\Validator $validator
     * @return void
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            redirect()->back()
                ->withErrors($validator, 'login') // 'login' error bag
                ->withInput() // Maintain the entered data
        );
    }
}
