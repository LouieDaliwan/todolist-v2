<?php

namespace Tests\Feature\Domain\Teams;

use Database\Factories\TeamFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteTeamActionsTest extends TestCase
{
    use RefreshDatabase;

    public function setUp() :void
    {
        parent::setUp();

        $this->signIn();
    }


    /** @test */
    function can_delete_a_team()
    {
        $team = TeamFactory::new()->create(['name' => 'Test Team Delete']);

        $this->delete("/teams-delete/{$team->id}");

        $this->assertSoftDeleted('teams', [
            'name' => $team->name,
            'description' => $team->description,
        ]);
    }
}
