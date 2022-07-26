<?php

namespace App\Http\Controllers\Teams;

use App\Http\Controllers\Controller;
use Domain\Teams\Actions\UpdateTeamAction;
use Domain\Teams\Models\Team;
use Illuminate\Http\Request;

class UpdateTeamController extends Controller
{
    public function __construct(public UpdateTeamAction $updateTeamAction){}

    public function __invoke(Request $request, Team $team)
    {
        return $this->updateTeamAction->execute();
}
}
