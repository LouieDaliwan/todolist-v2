<?php

namespace Tests\Feature\Domain\Teams;

use App\Models\Teams;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateTeamsActionTest extends TestCase
{
    use RefreshDatabase;

    protected function createTeam()
    {
        
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
}
