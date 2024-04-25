<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Providers\RouteServiceProvider;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_new_user_can_register(){
        $response = $this->post('/register',[
            'email' => 'idjordje02@gmail.com',
            'password' => 'testlozinka',
            'type' => 1
        ]);
        $response->assertStatus(200);
        //$this->assertAuthenticated();
        //$response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_user_can_login(){
        $response = $this->post('/login', [
            'email' => 'idjordje63@gmail.com',
            'password' => 'djordje002'
        ]);
        $response->assertStatus(200);
    }
}
