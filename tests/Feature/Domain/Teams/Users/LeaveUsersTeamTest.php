<?php

namespace Tests\Feature\Domain\Teams\Users;

use App\Models\User;
use Database\Factories\TeamFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LeaveUsersTeamTest extends TestCase
{
    use RefreshDatabase;

    public function setUp() : void
    {
        parent::setUp();

        $this->signIn();
    }

    /** @test */
    function a_user_can_leave_on_a_team()
    {
        $user = User::factory()->create();

        $team = TeamFactory::new()->withSignInUser($user);

        $this->signIn($user);

        $this->delete("/teams/{$team->id}/leave-users/{$user->id}");

        $this->assertCount(1, $team->users);
    }
}
