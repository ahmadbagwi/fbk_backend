<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Periode;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

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
            'name' => ['required', 'regex:/^[\pL\s\-]+$/u', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            // 'kegiatan' => ['required']
        ])->validate();

        $periode_aktif = Periode::where('status', 'aktif')->first()->id;

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            // 'kegiatan' => $input['kegiatan'],
            'periode_id' => $periode_aktif
        ]);
    }
}
