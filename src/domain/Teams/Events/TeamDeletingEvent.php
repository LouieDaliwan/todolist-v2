<?php

namespace Domain\Teams\Events;


use Domain\Teams\Models\Team;

class TeamDeletingEvent
{
    public function __construct(public Team $team){}

}
