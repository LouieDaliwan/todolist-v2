<?php

namespace Tests\Feature\Domain\Projects;

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

    /** @test */
    function authenticate_user_can_create_a_project()
    {
        $project = [
            'name' => 'Test Sample Project',
            'description' => 'Test Sample Project Description',
        ];

        $this->post('/projects', $project);

        $this->assertDatabaseHas('projects', [
            'name' => 'Test Sample Project',
            'description' => 'Test Sample Project Description'
        ]);
    }
}
