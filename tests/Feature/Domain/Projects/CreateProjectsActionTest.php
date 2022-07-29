<?php

namespace Tests\Feature\Domain\Projects;

use Database\Factories\ProjectFactory;
use Database\Factories\TeamFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateProjectsActionTest extends TestCase
{
    use RefreshDatabase;

    public function setup(): void
    {
        parent::setup();

        $this->signIn();
    }

    protected function createProject()
    {
        return TeamFactory::new()->create();
    }

    /** @test */
    function authenticate_user_can__create_a_project_with_selected_team()
    {
        $project = [
            'name' => 'Test Sample Project',
            'description' => 'Test Sample Project Description',
            'team_id' => $this->createProject()->id,
        ];

        $this->post('/projects', $project);

        $this->assertDatabaseHas('projects', [
            'name' => 'Test Sample Project',
            'description' => 'Test Sample Project Description'
        ]);
    }

    /** @test */
    function should_required_a_id_of_team_before_create_project()
    {
        $response = $this->post('/projects', [
            'name' => 'Test Sample Project',
            'description' => 'Test Sample Project Description',
        ]);

        $response->assertInvalid('team_id');
    }

    /** @test */
    function creator_will_be_the_first_member_project()
    {
        $project = ProjectFactory::new()->create(['team_id' => $this->createProject()->id]);

        $this->assertCount(1, $project->users);
    }
}
