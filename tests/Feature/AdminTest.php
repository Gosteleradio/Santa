<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/admin');

        $response->assertStatus(200);
        $response->assertSeeText('Admin Test 1');
        $response->assertCookieMissing( 'yuy');
    }
}
