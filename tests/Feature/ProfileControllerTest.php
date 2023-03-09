<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProfileControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testIndex()
    {
        // create a new user
        $user = User::factory()->create(); // Create a user using the user factory
        $this->actingAs($user); // Authenticate the user for the test

        // try the profile route
        $response = $this->get(route('profile'));

        // check successful request
        $response->assertStatus(200);

        // check it's the profile view being shown
        $response->assertViewIs('profile.profile');

        // check view has an authenticated user
        $response->assertViewHas('user');
    }
}
