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

        $team->users()->attach(auth()->user()->id);
    }

    public function subscribe(Dispatcher $dispatcher)
    {
        $dispatcher->listen(
            TeamCreatedEvent::class,
            self::class . '@createdTeam'
        );
    }
}
