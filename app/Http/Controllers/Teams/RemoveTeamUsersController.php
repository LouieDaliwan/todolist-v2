<?php

namespace App\Http\Controllers\Teams;

use App\Http\Controllers\Controller;
use Domain\Teams\Models\Team;
use Illuminate\Http\Request;

class RemoveTeamUsersController extends Controller
{
    public function __construct(){}

    public function __invoke(Request $request, Team $team)
    {
        $team->users()->detach($request['users_id']);
    }
}
