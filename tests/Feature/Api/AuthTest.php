<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_returns_token()
    {
        $user = User::factory()->create(["password" => bcrypt('secret123')]);

        $response = $this->postJson('/api/v1/login', [
            'email' => $user->email,
            'password' => 'secret123',
        ]);

        $response->assertStatus(200)
                 ->assertJsonStructure(['token','token_type','user']);

        $this->assertNotNull($user->fresh()->api_token);
    }

    public function test_protected_route_requires_token()
    {
        $response = $this->getJson('/api/v1/user');
        $response->assertStatus(401);
    }

    public function test_protected_route_with_token_succeeds()
    {
        $user = User::factory()->create(["password" => bcrypt('secret123')]);
        // obtain token
        $res = $this->postJson('/api/v1/login', ['email' => $user->email, 'password' => 'secret123']);
        $token = $res->json('token');

        $response = $this->withHeader('Authorization', 'Bearer '.$token)
                         ->getJson('/api/v1/user');
        $response->assertStatus(200)
                 ->assertJsonFragment(['email' => $user->email]);
    }

    public function test_logout_revokes_token()
    {
        $user = User::factory()->create(["password" => bcrypt('secret123')]);
        $res = $this->postJson('/api/v1/login', ['email' => $user->email, 'password' => 'secret123']);
        $token = $res->json('token');

        $this->withHeader('Authorization', 'Bearer '.$token)
             ->postJson('/api/v1/logout')
             ->assertStatus(200);

        // token should be revoked
        $this->withHeader('Authorization', 'Bearer '.$token)
             ->getJson('/api/v1/user')
             ->assertStatus(401);
    }
}
