<?php

namespace Domain\Teams\Actions;


use App\Models\Teams;
use Domain\Teams\DataTransferObjects\TeamData;
use Illuminate\Http\Request;

class CreateTeamAction
{
    public function __construct()
    {}

    public function execute(TeamData $teamData) : Teams
    {
        return Teams::firstOrCreate([
            'name' => $teamData->name,
            'description' => $teamData->description
        ]);
    }
}
