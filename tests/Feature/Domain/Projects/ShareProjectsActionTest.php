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

    /** @test */
    function it_share_the_project_on_members_of_selected_team()
    {
        $team = $this->createTeamWithMembers();

        $project = ProjectFactory::new()->create(['team_id' => $team->id]);

        //Todo optimize this
        $users_email = $team->users()->skip(1)->take(3)->get()
        ->map(function($item) {
            return $item->email;
        })->toArray();


        $this->post("/projects/{$project->id}/share", $users_email);

        $this->assertCount(4, $project->users);
    }

}
