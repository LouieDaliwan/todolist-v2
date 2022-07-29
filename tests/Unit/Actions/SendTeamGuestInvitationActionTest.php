<?php

namespace Tests\Unit\Actions;

use App\Actions\SendTeamGuestInvitation;
use App\Mail\TeamGuestInvitation;
use Database\Factories\TeamFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Support\Teams\SegregateRegisteredAndNonUser;
use Tests\TestCase;

class SendTeamGuestInvitationActionTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->signIn();
    }

    /** @test */
    function it_a_send_email_for_team_guest_invitation()
    {
        Mail::fake();

        $team = TeamFactory::new()->create();

        $seg_users = (new SegregateRegisteredAndNonUser)($team, ['Louie@test.com']);

        app(SendTeamGuestInvitation::class)->execute($seg_users['non_register_user'], $team);

        Mail::assertSent(TeamGuestInvitation::class);
    }
}
