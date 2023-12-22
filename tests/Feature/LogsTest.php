<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogsTest extends TestCase
{
    public function test_read_all_logs(): void
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
                        'api/logs', 
                        [
                            'paginate' => '10',
                            'page' => '1',
                            'orderBy' => 'id'
                        ]
                    );

        $response2->assertStatus(200);
    }
}
