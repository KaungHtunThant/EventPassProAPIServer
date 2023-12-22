<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    // use RefreshDatabase;

    public function test_create_user(): void
    {
        $response1 = $this->post(
            'api/login',
            [
                'email' => 'superadmin@powerglobal.com.mm',
                'password' => 'admin123!'
            ]
        );

        $response2 = $this->withHeader('Authorization', 'Bearer '.$response1['token'])
                    ->post(
                        'api/users', 
                        [
                            'name' => 'Test',
                            'email' => fake()->unique()->safeEmail(),
                            'password' => '12345678',
                            'password_confirmation' => '12345678'
                        ]
                    );

        $response2->assertStatus(201);
    }

    public function test_login(): void
    {
        $response = $this->post(
            'api/login',
            [
                'email' => 'test@mail.com',
                'password' => 'admin123!'
            ]
        );

        $response->assertStatus(200);
    }

    public function test_get_users(): void
    {
        $response1 = $this->post(
            'api/login',
            [
                'email' => 'superadmin@powerglobal.com.mm',
                'password' => 'admin123!'
            ]
        );

        $response2 = $this->withHeader('Authorization', 'Bearer '.$response1['token'])
                    ->get(
                        'api/users',
                    );

        $response2->assertStatus(200);
    }
}
