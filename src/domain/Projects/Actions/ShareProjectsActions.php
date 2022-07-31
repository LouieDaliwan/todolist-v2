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

            if ($user) {
                $teams_id = $user->teams()->get()->pluck('id');

                $is_not_team_member = $teams_id->isEmpty() ?  1 : in_array($project->team->id, $teams_id->toArray());


            } else {
                $user = User::create([
                    'email' => $userEmail,
                    'invitation_token' => bcrypt(config('invitationguest.token') . substr($userEmail, 1, 3)),
                    'invitation_state' => 'Pending' //todo laravel spatie enum
                ]);

                $is_not_team_member = True;
            }

            $project->users()->attach([$user->id => [
                'is_restricted' => $is_not_team_member
            ]]);
        });
    }
}
