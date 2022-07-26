<?php

namespace Tests\Feature\Domain\Teams;

use Database\Factories\TeamFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateTeamActionTest extends TestCase
{
    use RefreshDatabase;

    public function setup(): void
    {
        parent::setup();

        $this->signIn();
    }

    /** @test */
    function can_update_team_details()
    {
        $team = TeamFactory::new()->create();

        $this->put("/teams-update/{$team->id}", [
            'name' => 'John Doe Team',
            'description' => 'Web Dev Team',
        ]);

        $this->assertNotEquals('Test Team', $team->fresh()->name);
        $this->assertNotEquals('Test Description', $team->fresh()->description);
    }
}
