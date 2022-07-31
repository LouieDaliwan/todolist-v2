<?php

namespace Tests\Feature\Domain\Projects;

use App\Models\User;
use Database\Factories\ProjectFactory;
use Database\Factories\TeamFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShareProjectGuestsActionsTest extends TestCase
{
    use RefreshDatabase;

    public function setup(): void
    {
        parent::setup();

        $this->signIn();
    }

    protected function createTeamWithMembers()
    {
        return TeamFactory::new()->withUsersCreate(10); //todo will be set dynamic times of users
    }

    protected function createProjectWithMembers($team)
    {
        return ProjectFactory::new()->create(['team_id' => $team->id]);
    }

    /** @test */
    function a_owner_can_share_a_project_for_non_registered_users()
    {
        $team = $this->createTeamWithMembers();

        $project = $this->createProjectWithMembers($team);

        $this->post("/projects/{$project->id}/share", ['louie2@test.com']);

        $user = User::whereEmail('louie2@test.com')->first();

        $is_restricted = $project->users()->wherePivot('user_id', $user->id)
        ->first()
        ->pivot
        ->is_restricted;

        $this->assertTrue($is_restricted);
        $this->assertNull($team->users()->whereEmail($user->email)->first());
        $this->assertNotNull($user->invitation_token);
        $this->assertEquals('Pending', $user->invitation_state);
    }
}
