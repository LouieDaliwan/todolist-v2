<?php

namespace Domain\Sections\Actions;

use Domain\Sections\Models\Section;

class CreateSectionActions
{
    public function __invoke(array $attributes)
    {
        return Section::create([
            'name' => $attributes['name'],
            'project_id' => $attributes['project_id'] ?? null,
            'user_id' => auth()->user()->id,
        ]);
    }
}
