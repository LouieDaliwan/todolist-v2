<?php

namespace App\Http\Controllers\Teams;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teams\CreateTeamRequest;
use App\Models\Teams;
use Domain\Teams\Actions\CreateTeamAction;
use Domain\Teams\DataTransferObjects\TeamData;
use Illuminate\Http\Request;

class CreateTeamController extends Controller
{
    public function __construct(public CreateTeamAction $createTeamAction)
    {}

    public function __invoke(CreateTeamRequest $request): Teams
    {
        return $this->createTeamAction->execute(new TeamData(...$request->validated()));
    }
}
