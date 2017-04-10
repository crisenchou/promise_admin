<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{

    /**
     * login
     */
    public function testLogin()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }


    /**
     * register
     */
    public function testRegister()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);

    }


    /**
     * forgot password
     */
    public function testForgotPassword()
    {
        $response = $this->get('/forgot-password');
        $response->assertStatus(200);
    }

}
