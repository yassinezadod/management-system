<?php

namespace Tests\Feature\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    // public function test_new_users_can_register(): void
    // {
    //     $response = $this->post('/register', [
    //         'name' => 'Test User',
    //         'email' => 'test@example.com',
    //         'password' => 'password',
    //         'password_confirmation' => 'password',
    //         'username' => 'test',
    //         'terms_of_service' => true, // Ajoutez ce champ requis pour accepter les conditions
    //     ]);

    //     // Vérifiez que l'utilisateur est authentifié après l'enregistrement
    //     $this->assertAuthenticated();

    //     // Vérifiez que l'utilisateur est redirigé vers la page d'accueil
    //     $response->assertRedirect(RouteServiceProvider::HOME);
    // }
}
