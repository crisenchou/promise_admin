<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Auth;

class LoginTest extends TestCase
{
    public function testVisit()
    {
        $response = $this->get('login');
        $response->assertStatus(200);
    }

    public function testRootLogin()
    {
        $email = env('ROOT_EMAIL');
        $password = env('ROOT_PASSWORD');
        $auth = Auth::attempt([
            'email' => $email,
            'password' => $password
        ]);
        $this->assertTrue($auth);
    }

}
