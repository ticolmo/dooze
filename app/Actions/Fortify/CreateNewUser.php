<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Rules\AgeMinimal;
use App\Rules\Pseudo;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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
                new Pseudo
            ],
            'password' => $this->passwordRules(),
            'birthday' => [
                'required',
                'date',
                "date_format:Y-m-d",
                new AgeMinimal
            ],
            'categorie' => ['required', 'string', 'max:10'],
            'pays' => ['required', 'string', 'max:60'],
            'club_id' => ['required', 'string', 'max:4'],
            'langue_id' => ['required', 'string', 'max:1'],
            'bestmemory' => ['nullable', 'string', 'max:255'],
            'worsememory' => ['nullable', 'string', 'max:255'],
            'bestplayer' => ['nullable', 'string', 'max:40'],
            'bio' => ['nullable', 'string', 'max:255']
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
            'bestmemory' => $input['bestmemory'],
            'worsememory' => $input['worsememory'],
            'bestplayer' => $input['bestplayer'],
            'bio' => $input['bio']
        ]);
    }
}
