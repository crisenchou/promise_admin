<?php

namespace Tests\Feature\Home;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IndexTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testVisit()
    {
        $response = $this->get('/');
        $response->assertRedirect('login');
    }

    public function testVisitWithSession()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->get('/');
        $response->assertSee('欢迎登陆');
    }

}
