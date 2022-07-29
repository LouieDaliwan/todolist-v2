<?php

namespace Domain\Projects\Actions;

use Domain\Projects\DataTransferObjects\ProjectData;
use Domain\Projects\Models\Project;

class CreateProjectsAction
{
    public function __invoke(ProjectData $data) : Project
    {
        return Project::create([
            'name' => $data->name,
            'description' => $data->description
        ]);
    }
}
