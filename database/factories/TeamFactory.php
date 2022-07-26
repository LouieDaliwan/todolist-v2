<?php

namespace Database\Factories;

use App\Models\User;
use Domain\Teams\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeamFactory
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
}
