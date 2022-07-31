<?php

namespace Domain\Projects\Actions;

use App\Models\User;
use Domain\Projects\Models\Project;

class ShareProjectsActions
{
    public function __construct(){}

    public function __invoke(Project $project, array $userEmails)
    {
        collect($userEmails)->map(function($userEmail) use ($project) {

            $user = User::whereEmail($userEmail)->first();

            $teams_id = $user->teams()->get()->pluck('id');

            $is_not_team_member = $teams_id->isEmpty() ?  1 : in_array($project->team->id, $teams_id->toArray());

            $project->users()->sync([$user->id => [
                'is_restricted' => $is_not_team_member
            ]]);
        });
    }
}
