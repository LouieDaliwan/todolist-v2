<?php

namespace Tests\Feature\Domain\Projects;

use Database\Factories\ProjectFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateProjectsActionTest extends TestCase
{
    use RefreshDatabase;

    public function setup() : void
    {
        parent::setup();

        $this->signIn();
    }

    /** @test */
    function a_member_of_project_can_update_the_details()
    {
        $project = ProjectFactory::new()->create(['name' => 'Wrong Project']);

        $this->put("/projects/{$project->id}", [
            'name' => 'Project',
            'description' => $project->description
        ]);


        $this->assertNotEquals('Wrong Project', $project->fresh()->name);

    }
}
