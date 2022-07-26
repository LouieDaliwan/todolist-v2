<?php

namespace App\Http\Controllers\Teams;

use App\Http\Controllers\Controller;
use Domain\Teams\Actions\DeleteTeamAction;
use Domain\Teams\Models\Team;
use Illuminate\Http\Request;

class DeleteTeamController extends Controller
{
    public function __construct(public DeleteTeamAction $deleteTeamAction){}

    public function __invoke(Team $team)
    {
        return ($this->deleteTeamAction)($team);
    }
}
