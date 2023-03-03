<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Workout;
use Database\Factories\WorkoutFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;


class HomepageTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testIndex()
    {
        // Create a new user and log them in
        $user = User::factory()->create();
        $this->actingAs($user);

        // Create some workouts associated with the user
        $workouts = Workout::factory()->count(3)->create(['user_id' => $user->id]);

        // Send a GET request to the home page
        $response = $this->get(route('home'));

        // Assert that the response has a successful status code
        $response->assertSuccessful();

        // Assert that the user's workouts are displayed on the page
        foreach ($workouts as $workout) {
            $response->assertSee($workout->title);
        }
    }
}
