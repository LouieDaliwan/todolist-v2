<?php

namespace Tests\Unit\Actions;

use App\Actions\SendTeamInvitation;
use App\Mail\TeamInvitation;
use Database\Factories\TeamFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class SendTeamInvitationTest extends TestCase
{
    use RefreshDatabase;

    public function setUp() : void
    {
        parent::setUp();

        $this->signIn();
    }

    /** @test */
    function it_sends_a_email_team_invitation_for_selected_users()
    {
        Mail::fake();

        $team = TeamFactory::new()->withUsersCreate(10);

        $users_email = $team->users()->get()->map(function($user) {
            return ['email' => $user->email];
        })->toArray();

        $sendTeamInvitationAction = app(SendTeamInvitation::class);

        $sendTeamInvitationAction->execute($users_email, $team);

        Mail::assertSent(TeamInvitation::class);
    }
}
