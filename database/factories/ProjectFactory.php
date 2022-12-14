<?php

namespace Database\Factories;

use Database\Factories\Contract\Factory;
use Domain\Projects\Models\Project;
use Domain\Teams\Models\Team;

class ProjectFactory extends Factory
{
    public static function new() : self
    {
        return new self();
    }

    public function create(array $extra = [])
    {
        return Project::create(array_merge([
            'name' => 'Test Project',
            'description' => 'Test Project Description',
            'team_id' => null,
        ], $extra));
    }
}
