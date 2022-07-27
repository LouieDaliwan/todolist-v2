<?php

namespace Database\Factories;

use Database\Factories\Contract\Factory;
use App\Models\User;
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
}
