<?php

namespace App\Http\Controllers\Teams;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teams\UpdateTeamRequest;
use Domain\Teams\Actions\UpdateTeamAction;
use Domain\Teams\DataTransferObjects\TeamData;
use Domain\Teams\Models\Team;

class UpdateTeamController extends Controller
{
    public function __construct(public UpdateTeamAction $updateTeamAction){}

    public function __invoke(UpdateTeamRequest $request, Team $team)
    {
        return $this->updateTeamAction->execute($team, new TeamData(...$request->validated()));
    }
}
