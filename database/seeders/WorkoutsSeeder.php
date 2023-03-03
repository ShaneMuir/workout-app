<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Workout;
use App\Models\Exercise;
use App\Models\User;

class WorkoutsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::find(1); // Replace 1 with the ID of a user in your database

        // Create a new workout for the user
        $workoutOne = Workout::create([
            'title' => 'Chest Day',
            'date' => '2023-02-28',
            'user_id' => $user->id,
        ]);

        // Add exercises to the workout
        $workoutOne->exercises()->createMany([
            [
                'name' => 'Bench Press',
                'sets' => 3,
                'reps' => 8,
                'weight' => 100,
            ],
            [
                'name' => 'Incline Bench Press',
                'sets' => 3,
                'reps' => 8,
                'weight' => 80,
            ],
            [
                'name' => 'Dumbbell Flyes',
                'sets' => 3,
                'reps' => 10,
                'weight' => 20,
            ],
            [    'name' => 'Cable Crossovers',    'sets' => 3,    'reps' => 12,    'weight' => 50,],
            [    'name' => 'Incline Dumbbell Press',    'sets' => 3,    'reps' => 8,    'weight' => 70,],
            [    'name' => 'Decline Bench Press',    'sets' => 3,    'reps' => 10,    'weight' => 120,],
            [    'name' => 'Push Ups',    'sets' => 3,    'reps' => 15,    'weight' => null,],
            [    'name' => 'Dips',    'sets' => 3,    'reps' => 10,    'weight' => null,],
        ]);

        // Create a new workout for the user
        $workoutTwo = Workout::create([
            'title' => 'Back Day',
            'date' => now()->subDays(2),
            'user_id' => $user->id,
        ]);

// Add exercises to the workout
        $workoutTwo->exercises()->createMany([
            [        'name' => 'Deadlifts',        'sets' => 3,        'reps' => 8,        'weight' => 225,    ],
            [        'name' => 'Pull-ups', 'sets' => 3,        'reps' => 10,        'weight' => null,    ],
            [        'name' => 'Barbell Rows', 'sets' => 3,        'reps' => 8,        'weight' => 135,    ],
            [        'name' => 'Lat Pulldowns','sets' => 3,        'reps' => 12,        'weight' => 120,    ],
            [        'name' => 'Seated Cable Rows',        'sets' => 3,        'reps' => 10,        'weight' => 100,    ],
            [        'name' => 'T-Bar Rows',            'sets' => 3,            'reps' => 10,            'weight' => 90,        ],
            [        'name' => 'Bent Over Rows',            'sets' => 3,            'reps' => 8,            'weight' => 155,        ],
            [        'name' => 'Reverse Grip Rows',            'sets' => 3,            'reps' => 12,            'weight' => 100,        ],
            [        'name' => 'Chin-ups',            'sets' => 3,            'reps' => 8,            'weight' => null,        ],
            [        'name' => 'Dumbbell Rows',            'sets' => 3,            'reps' => 12,            'weight' => 50,        ],
        ]);


        // Create a new workout for the user
        $workoutThree = Workout::create([
            'title' => 'Cardio Day',
            'date' => now()->subDays(4),
            'user_id' => $user->id,
        ]);

        // Add exercises to the workout
        $workoutThree->exercises()->createMany([
            [
                'name' => 'Bench Press',
                'sets' => 3,
                'reps' => 8,
                'weight' => 100,
            ],
            [
                'name' => 'Incline Bench Press',
                'sets' => 3,
                'reps' => 8,
                'weight' => 80,
            ],
            [
                'name' => 'Dumbbell Flyes',
                'sets' => 3,
                'reps' => 10,
                'weight' => 20,
            ],
            [    'name' => 'Cable Crossovers',    'sets' => 3,    'reps' => 12,    'weight' => 50,],
            [    'name' => 'Incline Dumbbell Press',    'sets' => 3,    'reps' => 8,    'weight' => 70,],
            [    'name' => 'Decline Bench Press',    'sets' => 3,    'reps' => 10,    'weight' => 120,],
            [    'name' => 'Push Ups',    'sets' => 3,    'reps' => 15,    'weight' => null,],
            [    'name' => 'Dips',    'sets' => 3,    'reps' => 10,    'weight' => null,],
        ]);


        // Create a new workout for the user
        $workoutFour = Workout::create([
            'title' => 'Leg Day',
            'date' => now()->subDays(6),
            'user_id' => $user->id,
        ]);

        // Add exercises to the workout
        $workoutFour->exercises()->createMany([
            [
                'name' => 'Bench Press',
                'sets' => 3,
                'reps' => 8,
                'weight' => 100,
            ],
            [
                'name' => 'Incline Bench Press',
                'sets' => 3,
                'reps' => 8,
                'weight' => 80,
            ],
            [
                'name' => 'Dumbbell Flyes',
                'sets' => 3,
                'reps' => 10,
                'weight' => 20,
            ],
            [    'name' => 'Cable Crossovers',    'sets' => 3,    'reps' => 12,    'weight' => 50,],
            [    'name' => 'Incline Dumbbell Press',    'sets' => 3,    'reps' => 8,    'weight' => 70,],
            [    'name' => 'Decline Bench Press',    'sets' => 3,    'reps' => 10,    'weight' => 120,],
            [    'name' => 'Push Ups',    'sets' => 3,    'reps' => 15,    'weight' => null,],
            [    'name' => 'Dips',    'sets' => 3,    'reps' => 10,    'weight' => null,],
        ]);

    }
}
