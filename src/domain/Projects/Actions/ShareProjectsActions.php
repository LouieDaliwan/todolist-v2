<?php

namespace Domain\Projects\Actions;

use App\Models\User;
use Domain\Projects\Models\Project;

class ShareProjectsActions
{
    public function __invoke(Project $project, array $userEmails)
    {
        collect($userEmails)->map(function($userEmail) use($project) {

            $user = User::whereEmail($userEmail)->first();

            $project->users()->attach($user->id);
        });
    }
}
