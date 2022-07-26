<?php

namespace App\Http\Controllers\Teams;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teams\CreateTeamRequest;
use Domain\Teams\Actions\CreateTeamAction;
use Domain\Teams\DataTransferObjects\TeamData;
use Domain\Teams\Models\Team;

class CreateTeamController extends Controller
{
    public function __construct(public CreateTeamAction $createTeamAction){}

    public function __invoke(CreateTeamRequest $request): Team
    {
        return ($this->createTeamAction)(new TeamData(...$request->validated()));
    }
}
