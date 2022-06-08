<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'telefono' => 'numeric|required|digits_between:6,8',
            'edad' => 'numeric|required|min:18|max:100',
            'carnetIdentidad' => 'numeric|required|unique:users|digits_between:6,8',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'telefono' => $input['telefono'],
            'edad' => $input['edad'],
            'carnetIdentidad' => $input['carnetIdentidad'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
