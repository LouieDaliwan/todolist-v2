<?php

namespace Tests\Feature\Domain\Projects;

use App\Models\User;
use Database\Factories\ProjectFactory;
use Database\Factories\TeamFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShareProjectsActionTest extends TestCase
{
    use RefreshDatabase;

    public function setup() : void
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
    function it_share_the_project_on_members_of_selected_team()
    {
        $team = $this->createTeamWithMembers();

        $project = $this->createProjectWithMembers($team);

        //Todo optimize this
        $users_email = $team->users()->skip(1)->take(3)->get()
        ->map(function($item) {
            return $item->email;
        })->toArray();


        $this->post("/projects/{$project->id}/share", $users_email);

        $this->assertCount(4, $project->users);
    }

    /** @test */
    function it_can_share_of_a_non_member_of_team_and_set_to_be_restricted()
    {
        $team = $this->createTeamWithMembers();

        $project = $this->createProjectWithMembers($team);

        $user = User::factory()->create();

        $this->post("/projects/{$project->id}/share", [$user->email]);

        $is_restricted = $project->users()->wherePivot('user_id', $user->id)
        ->first()
        ->pivot
        ->is_restricted;

        $this->assertTrue($is_restricted);
        $this->assertNull($team->users()->whereEmail($user->email)->first());
    }

}
