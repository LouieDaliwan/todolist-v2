<?php

namespace Domain\Teams\Listeners;

use Domain\Teams\Events\TeamDeletingEvent;
use Illuminate\Events\Dispatcher;

class RemoveUser
{
    public function __construct(){}

    public function deletingTeam(TeamDeletingEvent $event)
    {
        $team = $event->team;

        $team->users()->detach(auth()->user()->id);
    }

    public function subscribe(Dispatcher $dispatcher)
    {
        $dispatcher->listen(
            TeamDeletingEvent::class,
            self::class . '@deletingTeam'
        );
    }
}
