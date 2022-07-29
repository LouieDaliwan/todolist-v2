<?php

namespace App\Actions;

use App\Mail\TeamGuestInvitation;
use App\Models\User;
use Domain\Teams\Models\Team;
use Illuminate\Support\Facades\Mail;
use Spatie\QueueableAction\QueueableAction;

class SendTeamGuestInvitation
{
    use QueueableAction;

    /**
     * Create a new action instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Prepare the action for execution, leveraging constructor injection.
    }

    /**
     * Execute the action.
     *
     * @return mixed
     */
    public function execute(array $attributes, Team $team) : void
    {
        collect($attributes)->map(function($item) use ($team){
            $user = User::whereEmail($item['email'])->first();

            Mail::to($user->email)->send(new TeamGuestInvitation($team, $user));
        });
    }
}
