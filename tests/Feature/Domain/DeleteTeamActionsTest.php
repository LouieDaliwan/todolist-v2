<?php

namespace Tests\Feature\Domain;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteTeamActionsTest extends TestCase
{
    public function setUp() :void
    {
        parent::setUp();

        $this->signIn();
    }


    /** @test */
    function can_delete_a_team()
    {
        
    }
}
