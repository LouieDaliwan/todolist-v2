<?php

namespace Database\Factories;

use Database\Factories\Contract\Factory;
use Domain\Sections\Models\Section;

class SectionFactory extends Factory
{
    public function create(array $extra = []): Section
    {
        return Section::create(array_merge([
            'name' => 'Test Team',
            'description' => 'Test Description'
        ], $extra));
    }
}
