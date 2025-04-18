<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
            'phone_number' => ['required', 'string', 'max:20'], // Validation for phone number
            'nid_number' => ['required', 'string', 'max:30'], // Validation for NID number
            'division' => ['required', 'string', 'max:255'], // Validation for division
            'district' => ['required', 'string', 'max:255'], // Validation for district
            'full_address' => ['required', 'string', 'max:500'], // Validation for full address
            'role' => ['required', 'in:owner,puller'], // Validation for role
        ];
    }
}
