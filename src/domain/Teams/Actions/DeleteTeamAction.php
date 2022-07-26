<?php

namespace Domain\Teams\Actions;

use Domain\Teams\Models\Team;

class DeleteTeamAction
{
    public function __invoke(Team $team)
    {
        $team->delete();
    }
}
