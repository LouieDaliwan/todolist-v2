<?php

namespace Tests\Feature\Domain\Teams;

use App\Models\Teams;
use Domain\Teams\Models\Team;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateTeamsActionTest extends TestCase
{
    use RefreshDatabase;

    public function setup(): void
    {
        parent::setup();

        $this->signIn();
    }

    /** @test */
    function can_create_a_teams()
    {
        // action
        $this->post('/teams-create', [
            'description' => 'Teams description',
            'name' => 'Test Teams'
        ]);


        //assertion
        $this->assertDatabaseHas('teams', [
            'name' => 'Test Teams',
            'description' => 'Teams description',
        ]);
    }

    /** @test */
    function created_team_have_automatically_assigned_member()
    {
         $this->post('/teams-create', [
             'description' => 'Teams description',
             'name' => 'Test Teams'
         ]);

         $team = Team::first();

         $this->assertEquals(1, $team->users->count());
    }
}
