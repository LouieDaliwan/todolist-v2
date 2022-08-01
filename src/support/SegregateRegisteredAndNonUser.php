<?php

namespace Support;

use App\Models\User;
use Domain\Teams\Models\Team;

class SegregateRegisteredAndNonUser
{
    public function __invoke(Team $team, array $attributes) : array
    {
        $temp_arr = [
            'registered_user' => [],
            'non_register_user' => [],
        ];

        foreach ($attributes as $attribute) {
            $user = User::whereEmail($attribute)->first();

            if ($user) {
                $team->users()->attach($user->id);

                $temp_arr['registered_user'][] = [
                    'user_id' => $user->id,
                    'email' => $user->email,
                ];
            } else {
                $user = $this->createUser($attribute);

                $team->users()->attach($user->id);

                $temp_arr['non_register_user'][] = [
                    'user_id' => $user->id,
                    'email' => $user->email,
                ];
            }
        }

        return $temp_arr;
    }

    protected function createUser($email)
    {
       return User::create([
            'email' => $email,
            'invitation_token' => bcrypt(config('invitationguest.token') . substr($email, 1, 3)),
            'invitation_state' => 'Pending' //todo laravel spatie enum
        ]);
    }
}
