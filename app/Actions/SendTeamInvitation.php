<?php

namespace App\Actions;


use App\Mail\TeamInvitation;
use Domain\Teams\Models\Team;
use Illuminate\Support\Facades\Mail;
use Spatie\QueueableAction\QueueableAction;

class SendTeamInvitation
{
    use QueueableAction;

    /**
     * Create a new action instance.
     *
     * @return void
     */
    public function __construct(){}

    /**
     * Execute the action.
     *
     * @return mixed
     */
    public function execute(array $attributes, Team $team)
    {
        logger('before iteration');
        collect($attributes)->map(function($item) use ($team) {
            logger($item['email']);
            Mail::to($item['email'])->send(new TeamInvitation($team));
            logger('email sent');
        });
    }
}
