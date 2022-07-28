<?php

namespace Domain\Teams\Listeners;

use Domain\Teams\Events\TeamCreatedEvent;
use Illuminate\Events\Dispatcher;

class AttachOwner
{
    public function __construct(){}

    public function createdTeam(TeamCreatedEvent $event)
    {
        $team = $event->team;

        $team->users()->sync([auth()->user()->id, ['is_owner' => true]]);
    }

    public function subscribe(Dispatcher $dispatcher)
    {
        $dispatcher->listen(
            TeamCreatedEvent::class,
            self::class . '@createdTeam'
        );
    }
}
