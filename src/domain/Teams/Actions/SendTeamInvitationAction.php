<?php

namespace Domain\Teams\Actions;

use Illuminate\Support\Facades\Mail;

class SendTeamInvitationAction
{
    use QueueableActionFak;

    public function __construct(public TeamInvitationAction $teamInvitationAction){}

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __invoke(public array $attributes)
    {
        collect($attributes)->map(function($item) {
            Mail::to($item['user_email'])->send(
                ($this->teamInvitationAction)()
            );
        });

    }
}
