<?php

namespace Tests\Feature;

use App\Models\Exercise;
use App\Models\User;
use App\Models\Workout;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Tests\TestCase;

class WorkoutControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    public function test_guest_cannot_access_create_page()
    {
        // try to get the workout create view when not logged in
        $response = $this->get(route('workouts.create'));

        // check we have been redirected to log in
        $response->assertRedirect(route('login'));
    }

    public function test_logged_in_user_can_access_create_page()
    {
        // create a new user
        $user = User::factory()->create();

        // try access workout create page as a logged-in user
        $response = $this->actingAs($user)->get(route('workouts.create'));

        // check the response is successful
        $response->assertStatus(200);

        // check the view is the workout create view
        $response->assertViewIs('workouts.create');
    }

    public function test_user_can_store_workouts()
    {
        $user = User::factory()->create();
        $exerciseData = [
            [
                'name' => 'Bench Press',
                'sets' => 3,
                'reps' => 10,
                'weight' => 100,
            ],
            [
                'name' => 'Squat',
                'sets' => 4,
                'reps' => 8,
                'weight' => 120,
            ],
        ];

        $requestData = [
            'title' => 'My Workout',
            'date' => '2023-03-10',
            'exercises' => $exerciseData,
        ];

        $request = new Request($requestData);

        $response = $this->actingAs($user)
            ->post(route('workouts.store'), $request->all());

        $response->assertRedirect(route('home'));
        $response->assertSessionHas('success', 'Workout created successfully!');

        $workout = Workout::where('title', 'My Workout')->first();
        $this->assertNotNull($workout);
        $this->assertEquals($requestData['title'], $workout->title);
        $this->assertEquals($requestData['date'], $workout->date);
        $this->assertEquals($user->id, $workout->user_id);

        foreach ($exerciseData as $exercise) {
            $exerciseModel = Exercise::where('name', $exercise['name'])->first();
            $this->assertNotNull($exerciseModel);
            $this->assertEquals($exercise['sets'], $exerciseModel->sets);
            $this->assertEquals($exercise['reps'], $exerciseModel->reps);
            $this->assertEquals($exercise['weight'], $exerciseModel->weight);
            $this->assertEquals($workout->id, $exerciseModel->workout_id);
        }
    }


    public function test_user_can_edit_workout()
    {
        $user = User::factory()->create();
        $workout = Workout::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)
            ->get(route('workouts.edit', ['id' => $workout->id]));

        $response->assertStatus(200)
            ->assertViewIs('workouts.edit')
            ->assertViewHas('workout', $workout)
            ->assertViewHas('user', $user);
    }


    public function test_user_can_update_workouts()
    {
        $user = User::factory()->create();
        $workout = Workout::factory()->create(['user_id' => $user->id]);

        $exercises = [
            [
                'name' => 'Exercise 1',
                'sets' => 3,
                'reps' => 10,
                'weight' => 50.0,
            ],
            [
                'name' => 'Exercise 2',
                'sets' => 4,
                'reps' => 12,
                'weight' => 60.0,
            ],
        ];
        $data = [
            'title' => 'Updated Workout',
            'date' => now()->format('Y-m-d'),
            'exercises' => $exercises,
        ];

        // Test with valid input data
        $response = $this->actingAs($user)
            ->put(route('workouts.update', ['id' => $workout->id]), $data);


        $response->assertStatus(302)
            ->assertRedirect(route('home'))
            ->assertSessionHas('success', 'Workout updated successfully.');

        $updatedWorkout = Workout::find($workout->id);
        $this->assertEquals($data['title'], $updatedWorkout->title);
        $this->assertEquals($data['date'], $updatedWorkout->date);
        $this->assertCount(2, $updatedWorkout->exercises);

        // Test with invalid input data
        $invalidData = [
            'title' => '',
            'date' => '',
            'exercises' => [],
        ];

        $response = $this->actingAs($user)
            ->put(route('workouts.update', ['id' => $workout->id]), $invalidData);

        $response->assertStatus(302)
            ->assertSessionHasErrors(['title', 'date', 'exercises']);

        $updatedWorkout = Workout::find($workout->id);
        $this->assertNotEquals($invalidData['title'], $updatedWorkout->title);
        $this->assertNotEquals($invalidData['date'], $updatedWorkout->date);
        $this->assertCount(2, $updatedWorkout->exercises);
    }

}
