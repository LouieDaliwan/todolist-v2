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

    protected function createTeamAndUser(): array
    {
        $user = User::factory()->create();

        $team = TeamFactory::new()->withSignInUser($user);

        return [
            'team' => $team,
            'user' => $user,
        ];
    }
    /** @test */
    function a_user_can_leave_on_a_team()
    {
        $arr = $this->createTeamAndUser();

        $this->signIn($arr['user']);

        $this->delete("/teams/{$arr['team']->id}/leave-users/{$arr['user']->id}");

        $this->assertCount(1, $arr['team']->users);
    }

    /** @test */
    function only_authenticated_user_can_leave_to_the_team()
    {
        $arr = $this->createTeamAndUser();

        $this->delete("/teams/{$arr['team']->id}/leave-users/{$arr['user']->id}");

        $this->assertCount(2, $arr['team']->users);
    }
}
