<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Ad;
use App\Models\User;
use Tests\TestCase;

class ApplicationsTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    public function test_apply_for_job()
    {
        // Kreiranje testnog korisnika
        $user = User::factory()->create();

        // Kreiranje testnog oglasa
        $ad = Ad::factory()->create();

        // Simulacija POST zahteva
        $response = $this->actingAs($user)->postJson('/apply/' . $ad->id);

        // Provera statusa odgovora
        $response->assertStatus(200);

        // Provera poruke u odgovoru
        $response->assertJson([
            'type' => 'success',
            'message' => 'Uspesno ste aplicirali za ovaj posao!'
        ]);

        // Provera da li je veza uspešno kreirana
        $this->assertTrue($ad->users()->where('user_id', $user->id)->exists());
    }

}
