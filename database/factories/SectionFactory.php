<?php

namespace Database\Factories;

use Database\Factories\Contract\Factory;
use Domain\Sections\Models\Section;

class SectionFactory extends Factory
{
    public static function new(): self
    {
        return new self();
    }

    public function create(array $extra = []): Section
    {
        return Section::create(array_merge([
            'name' => 'Test Team',
            'user_id' => auth()->user()->id,
        ], $extra));
    }
}
