<?php

namespace Tests\Feature\Domain\Teams\Users;

use App\Actions\SendTeamGuestInvitation;
use App\Actions\SendTeamInvitation;

use App\Models\User;
use Database\Factories\TeamFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
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
    function team_member_can_send_invitation_to_join_in_team_without_project()
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

    /** @test */
    function team_member_can_send_invitation_in_a_non_registered_user_to_join_in_team_without_project()
    {
        Queue::fake();

        //create a team
        $team = TeamFactory::new()->create();

        $non_register_user = ['Louie@test.com'];

        //invite request parameters
        $this->post("/teams/{$team->id}/invite-users", $non_register_user);

        //assert two members in a teams
        $this->assertCount(2, $team->users);

        //fetch the new created users
        $user = $team->users()->whereEmail('Louie@test.com')->first();

        $this->assertNotNull($user->invitation_token);

        $this->assertEquals('Pending', $user->invitation_state);

        //assert that job dispatch is successful
        QueueableActionFake::assertPushed(SendTeamGuestInvitation::class);
        QueueableActionFake::assertPushedTimes(SendTeamGuestInvitation::class, 1);
    }
}
