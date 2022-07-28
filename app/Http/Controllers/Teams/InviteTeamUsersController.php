<?php

namespace App\Http\Controllers\Teams;

use App\Http\Controllers\Controller;
use Domain\Teams\Actions\InviteTeamUsersAction;
use Domain\Teams\Models\Team;
use Illuminate\Http\Request;

class InviteTeamUsersController extends Controller
{
    public function __construct(public InviteTeamUsersAction $inviteTeamUsersAction){}

    public function __invoke(Request $request, Team $team)
    {
        return ($this->inviteTeamUsersAction)($request->toArray(), $team);
    }
}
