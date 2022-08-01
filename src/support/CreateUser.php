<?php

namespace Support;

use App\Models\User;

class CreateUser
{
    public function __invoke(string $email)
    {
        return User::create([
            'email' => $email,
            'invitation_token' => bcrypt(config('invitationguest.token') . substr($email, 1, 3)),
            'invitation_state' => 'Pending' //todo laravel spatie enum
        ]);
    }
}
