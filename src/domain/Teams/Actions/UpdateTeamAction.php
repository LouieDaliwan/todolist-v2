<?php

namespace Domain\Teams\Actions;


use Domain\Teams\DataTransferObjects\TeamData;
use Domain\Teams\Models\Team;

class UpdateTeamAction
{
    public function __construct(){}

    public function execute(Team $team, TeamData $teamData) : Team
    {
        return $team->update([
            'name' => $teamData->name,
            'description' => $teamData->description
        ]);
    }
}
