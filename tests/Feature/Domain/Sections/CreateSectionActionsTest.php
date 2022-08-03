<?php

namespace Tests\Feature\Domain\Sections;

use Database\Factories\ProjectFactory;
use Domain\Projects\Models\Project;
use Domain\Sections\Models\Section;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateSectionActionsTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setup();

        $this->signIn();
    }

    /** @test */
    function a_user_can_create_section()
    {
        $this->post('/sections', ['name' => 'Pending']);

        $this->assertDatabaseHas('sections', [
            'user_id' => auth()->user()->id,
            'name' => 'Pending'
        ]);
    }

    /** @test */
    function a_user_can_create_multiple_section()
    {
        $this->post('/sections', ['name' => 'Pending']);
        $this->post('/sections', ['name' => 'Self Review']);

        $sections = Section::all();

        $this->assertCount(2, $sections);
    }

    /** @test */
    function a_user_can_create_section_projects()
    {
        $project = ProjectFactory::new()->create();

        $this->post('/sections', [
            'project_id' => $project->id,
            'name' => 'Pending'
        ]);

        $this->assertDatabaseHas('sections', [
            'user_id' => auth()->user()->id,
            'project_id' => $project->id,
            'name' => 'Pending'
        ]);
    }
}
