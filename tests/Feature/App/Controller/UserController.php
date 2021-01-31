<?php

namespace Tests\Feature\App\Controller;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserController extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->action('GET', 'UserController@find', ['id' => 1]);

        $response->assertEquals('langworth.deven@example.org',$resonse->email);
    }
}
