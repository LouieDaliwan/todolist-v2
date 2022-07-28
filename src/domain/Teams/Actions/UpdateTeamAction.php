<?php

namespace Domain\Teams\Actions;


use Domain\Teams\DataTransferObjects\TeamData;
use Domain\Teams\Models\Team;

class UpdateTeamAction
{
    public function __invoke(Team $team, TeamData $teamData) : Team
    {
        $team->update([
            'name' => $teamData->name,
            'description' => $teamData->description
        ]);
        return $team;
    }
}
