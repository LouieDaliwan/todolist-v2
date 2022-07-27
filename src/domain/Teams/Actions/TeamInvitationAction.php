<?php

namespace Domain\Teams\Actions;

use App\Models\User;
use Domain\Teams\Models\Team;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TeamInvitationAction extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Team $team)
    {

    }

    public function build(Team $team)
    {
        return $this->view('view.name');
    }
}
