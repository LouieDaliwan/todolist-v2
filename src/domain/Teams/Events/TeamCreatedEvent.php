<?php

namespace Domain\Teams\Events;


use Domain\Teams\Models\Team;

class TeamCreatedEvent
{
    public function __construct(public Team $team){

    }


}
