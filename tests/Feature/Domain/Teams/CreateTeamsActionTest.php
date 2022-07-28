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
    function a_creator_of_team_automatically_member()
    {
         $this->post('/teams-create', [
             'description' => 'Teams description',
             'name' => 'Test Teams'
         ]);

         $team = Team::first();

         $this->assertEquals(1, $team->users->count());
    }

    /** @test */
    function a_creator_will_automatically_owner_of_team()
    {
        $this->markTestIncomplete();
    }
}
