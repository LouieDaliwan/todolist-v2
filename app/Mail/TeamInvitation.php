<?php

namespace App\Mail;

use Domain\Teams\Models\Team;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TeamInvitation extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Team $team){}

    public function build()
    {
        return $this->view('view.name');
    }
}
