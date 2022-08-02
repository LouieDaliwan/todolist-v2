<?php

namespace Tests\Feature\Domain\Tasks;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTasksActionTest extends TestCase
{
    use RefreshDatabase;

    public function setup(): void
    {
        parent::setup();

        $this->signIn();
    }

    /** @test */
    function a_user_can_create_tasks()
    {
        $this->markTestIncomplete();
    }
}
