<?php

namespace Support\Teams;

use App\Models\User;
use Domain\Teams\Models\Team;

class SegregateRegisteredAndNonUser
{
    public function __invoke(Team $team, array $attributes) : array
    {
        $temp_arr = [
            'registered_user' => [],
        ];

        foreach ($attributes as $attribute) {

            $user = User::whereEmail($attribute)->first();

            if ($user) {
                $team->users()->attach($user->id);

                $temp_arr['registered_user'][] = [
                    'user_id' => $user->id,
                    'email' => $user->email,
                ];
            }

        }

        return $temp_arr;
    }
}
