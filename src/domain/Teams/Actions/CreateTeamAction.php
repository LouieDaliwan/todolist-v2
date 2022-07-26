<?php

namespace Domain\Teams\Actions;



use Domain\Teams\DataTransferObjects\TeamData;
use Domain\Teams\Models\Team;
use Illuminate\Http\Request;

class CreateTeamAction
{
    public function __construct(){}

    public function execute(TeamData $teamData) : Team
    {
        return Team::firstOrCreate([
            'name' => $teamData->name,
            'description' => $teamData->description
        ]);
    }
}
