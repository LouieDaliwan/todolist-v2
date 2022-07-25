<?php

namespace Tests\Feature\Domain;

use App\Models\Teams;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateTeamsActionsTest extends TestCase
{
    use RefreshDatabase;

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
