<?php

namespace Domain\Projects\Events;

use Domain\Projects\Models\Project;

class ProjectCreatedEvent
{
    public function __construct(public Project $project){}
}
