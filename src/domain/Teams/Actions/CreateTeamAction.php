<?php

namespace Domain\Teams\Actions;


use App\Models\Teams;
use Domain\Teams\DataTransferObjects\TeamData;
use Domain\Teams\Models\Team;
use Illuminate\Http\Request;

class CreateTeamAction
{
    public function __construct(){}

    public function execute(TeamData $teamData) : Teams
    {
        return Team::firstOrCreate([
            'name' => $teamData->name,
            'description' => $teamData->description
        ]);
    }
}
