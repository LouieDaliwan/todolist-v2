<?php

namespace Domain\Projects\Listeners;

use Domain\Projects\Events\ProjectCreatedEvent;
use Illuminate\Events\Dispatcher;

class AttachMember
{
    public function __construct(){}

    public function createdProject(ProjectCreatedEvent $event)
    {
        $project = $event->project;

        $project->users()->sync(auth()->user()->id);
    }

    public function subscribe(Dispatcher $dispatcher)
    {
        $dispatcher->listen(
            ProjectCreatedEvent::class,
            self::class . '@createdProject'
        );
    }
}
