<?php

namespace Domain\Teams\Actions;


use Domain\Teams\DataTransferObjects\TeamData;
use Domain\Teams\Models\Team;

class UpdateTeamAction
{
    public function __construct(){}

    public function execute(TeamData $teamData, Team $team) : Team
    {
        return $team->update([
            'name' => $teamData->name,
            'description' => $teamData->description
        ]);
    }
}
