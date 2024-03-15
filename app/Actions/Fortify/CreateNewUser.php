<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'pseudo' => [
                'required',
                'min:5',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'categorie' => ['required', 'string', 'max:10'],
            'pays' => ['required', 'string', 'max:60'],
            'club_id' => ['required', 'string', 'max:4'],
            'langue_id' => ['required', 'string', 'max:1'],
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'pseudo' => $input['pseudo'],
            'password' => Hash::make($input['password']),
            'categorie' => $input['categorie'],
            'pays' => $input['pays'],
            'club_id' => $input['club_id'],
            'langue_id' => $input['langue_id'],
        ]);
    }
}
