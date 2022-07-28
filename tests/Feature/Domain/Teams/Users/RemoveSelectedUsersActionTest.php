<?php

namespace Tests\Feature\Domain\Teams\Users;

use Database\Factories\TeamFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RemoveSelectedUsersActionTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp() : void
    {
        parent::setUp();

        $this->signIn();
    }

    /** @test */
    function a_owner_can_remove_selected_user()
    {
        $team = TeamFactory::new()->withUsersCreate(10);

        $this->put("/teams/{$team->id}/remove-users", [
         'users_id' => ['2', '3', '4', '5']
        ]);

        $this->assertCount(7, $team->users);
    }
}
