<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

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
        error_log('a');
        $user = $this->route("user");
        return [
            "name" => ["required", "string", "max:255"],
            "username" => [
                "required",
                "string",
                Rule::unique('users')->ignore($user->id),
            ],
            "email" => [
                "required",
                "email",
                Rule::unique('users')->ignore($user->id),
            ],
            "role" => [
                "required",
                "string",
                Rule::in('user', 'admin'),
            ],
            "password" => [
                'nullable',
                'confirmed',
                Password::min(8)->letters()->symbols(),
            ],
        ];
    }
}
