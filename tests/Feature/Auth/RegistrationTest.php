<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_it_requires_a_name()
    {
        
        $this->json('POST', 'api/auth/register')
            ->assertJsonValidationErrors(['name']);
    }
}
