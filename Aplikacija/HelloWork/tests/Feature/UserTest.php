<?php

namespace Tests\Feature;

use App\Models\UserInfo;
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
        $response = $this->post('/updateUserData' , [
            'name' => 'Leke Jovanovic',
            'professional_title' => 'Pekar',
            'languages' => 'Srpski',
            'age' => 21,
            'current_salary' => 100000,
            'expected_salary' => 150000,
            'phone' => '063347054',
            'country' => 'Srbija',
            'postcode' => '16210',
            'city' => 'Vlasotince',
            'full_address' => 'Mije Milenkovic 125'
        ]);

        $response->assertStatus(200);
        }
}
