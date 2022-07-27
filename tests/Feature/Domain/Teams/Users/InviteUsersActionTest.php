<?php

namespace Tests\Feature\Domain\Teams\Users;

use App\Actions\SendTeamInvitation;

use App\Models\User;
use Database\Factories\TeamFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Bus;
use Spatie\QueueableAction\Testing\QueueableActionFake;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class InviteUsersActionTest extends TestCase
{
    use RefreshDatabase;

    public function setUp() : void
    {
        parent::setUp();

        $this->signIn();
    }

    /** @test */
    function team_user_can_invite_registered_user_attach_without_project()
    {
        Queue::fake();

        //create a team
        $team = TeamFactory::new()->create();

        $users_email = User::factory()
        ->count(5)
        ->create()->map(function($user) {
            return $user->email;
        })->toArray();

        //invite request parameters
        $this->post("/teams/{$team->id}/invite-users", $users_email);

        //assert attached
        $this->assertCount(6, $team->users);

        //assert that job dispatch is successful
        QueueableActionFake::assertPushed(SendTeamInvitation::class);
        QueueableActionFake::assertPushedTimes(SendTeamInvitation::class, 1);
    }
}
