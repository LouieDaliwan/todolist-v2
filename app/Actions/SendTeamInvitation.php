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
        collect($attributes)->map(function($item) use ($team) {
            Mail::to($item['email'])->send(new TeamInvitation($team));
        });
    }
}
