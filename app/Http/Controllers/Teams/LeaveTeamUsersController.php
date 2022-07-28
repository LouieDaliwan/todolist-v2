<?php

namespace App\Http\Controllers\Teams;

use App\Http\Controllers\Controller;
use App\Models\User;
use Domain\Teams\Models\Team;
use Illuminate\Http\Request;

class LeaveTeamUsersController extends Controller
{
    public function __invoke(Team $team, User $user)
    {
        $user->teams()->detach($team->id);

        return $user->teams()->detach($team->id);
    }
}
