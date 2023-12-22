<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ErrorsTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_login_fail_email(): void
    {
        $response = $this->post(
            'api/login',
            [
                'email' => 'tes@mail.com',
                'password' => 'admin123!'
            ]
        );

        $response->assertStatus(401);
    }

    public function test_login_fail_password(): void
    {
        $response = $this->post(
            'api/login',
            [
                'email' => 'test@mail.com',
                'password' => 'admin123'
            ]
        );

        $response->assertStatus(401);
    }

    public function test_create_user_fail_credentials(): void
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
                            'password_confirmation' => '12345679'
                        ]
                    );

        $response2->assertStatus(422);
    }

    public function test_create_user_fail_permission(): void
    {
        $response1 = $this->post(
            'api/login',
            [
                'email' => 'test@mail.com',
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

        $response2->assertStatus(403);
    }
}
