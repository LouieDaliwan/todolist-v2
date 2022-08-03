<?php

namespace Tests\Feature\Domain\Tasks;

use Database\Factories\SectionFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTasksActionTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setup();

        $this->signIn();
    }

    /** @test */
    function a_user_can_create_tasks()
    {
        $section = SectionFactory::new()->create();

        $this->post("/sections/{$section->id}/tasks");

        $this->assertCount(1, $section->tasks);
    }

    /** @test */
    function a_user_can_create_tasks_on_project()
    {
        $this->markTestIncomplete();
    }
}
