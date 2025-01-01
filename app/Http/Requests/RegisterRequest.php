<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
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
            'registerEmail' => 'required|email|unique:users,email',
            'registerPassword' => 'required|min:6|confirmed',
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
            'name.required' => 'The name field is required.',
            'registerEmail.required' => 'The email field is required.',
            'registerEmail.email' => 'Please provide a valid email address.',
            'registerEmail.unique' => 'This email is already registered.',
            'registerPassword.required' => 'The password field is required.',
            'registerPassword.min' => 'The password must be at least 6 characters long.',
            'registerPassword.confirmed' => 'The password confirmation does not match.',
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
                ->withErrors($validator, 'register') // 'register' error bag
                ->withInput() // Maintain the entered data
        );
    }
}
