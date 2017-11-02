<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RouteTest extends TestCase
{

    public function testHome()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testLogin()
    {
        $response = $this->get('login');
        $response->assertStatus(200);
    }

    public function testRegister()
    {
        $response = $this->get('register');
        $response->assertStatus(200);
    }

    public function testCaptcha()
    {
        $response = $this->get('captcha' . mt_rand(1000, 9999));
        $response->assertStatus(200);
    }
}
