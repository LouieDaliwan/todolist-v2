<?php

namespace Database\Factories;

use App\Models\User;
use Database\Factories\Contract\Factory;
use Domain\Teams\Models\Team;

class TeamFactory extends Factory
{
    public static function new(): self
    {
        return new self();
    }

    public function create(array $extra = []): Team
    {
        return Team::create(array_merge([
            'name' => 'Test Team',
            'description' => 'Test Description'
        ], $extra));
    }

    public function withUsersCreate(int $times) : Team
    {
        $team = $this->create();

        $users = User::factory()->count($times)->create();

        $users->map(function($user) use ($team) {
            $team->users()->attach($user->id);
        });

        return $team;
    }

    public function withSignInUser($auth)
    {
        $team = $this->create();

        $team->users()->attach($auth->id);

        return $team;
    }
}
