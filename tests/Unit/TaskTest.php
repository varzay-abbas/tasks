<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHomeTest()
    {
        $this->visit('/')->see('Task');
    }

    /**
     * A basic Create Task test with post api/task.
     *
     * @return void
     */
    public function testCreateTaskTest()
    {
        $this->json('POST', '/api/task', ['user_id' => '1', 'title' => 'TaskUnitTest1', 'is_done' => '1', 'points' => 2])
             ->seeJson([
                 'title' => "TaskUnitTest1",
             ]);
    }

    /**
     * A basic Create sub Task test with post api/task.
     *
     * @return void
     */
    public function testCreateSubTaskTest()
    {
        $this->json('POST', '/api/task', ['user_id' => '1', 'parent_id' => '1', 'title' => 'TaskUnitTest1.1', 'is_done' => '1', 'points' => 2])
             ->seeJson([
                 'title' => "TaskUnitTest1.1",
                 'parent_id' => '1',
             ]);
    }
}
