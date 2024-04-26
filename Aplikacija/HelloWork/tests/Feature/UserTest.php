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

    // public function test_new_user_can_register(){
    //     $response = $this->post('/register',[
    //         'email' => 'idjordje02@gmail.com',
    //         'password' => 'testlozinka',
    //         'type' => 1
    //     ]);
    //     $response->assertStatus(200);
    // }

    public function test_user_can_login(){
        $response = $this->post('/login', [
            'email' => 'idjordje63@gmail.com',
            'password' => 'djordje002'
        ]);
        $response->assertStatus(200);
    }

    public function test_update_user_data(){
        $response = $this->post('/updateUserData', [
            'professional_title' => 'Pekar',
            'languages' => 'Srpski',
            'current_salary' => '2000',
            'expected_salary' => '2400',
            'phone' => '0637303883',
            'country' => 'Srbija',
            'postcode' => '18000',
            'city' => 'Nis',
            'full_address' => 'Stara Zeleznicka Kolonija 5a'
        ]);
        $response->assertStatus(200);
    }
}
