<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Workout;
use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $user = auth()->user();
        return view('workouts.create', ['user' => $user]);
    }

    public function store(Request $request): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {

        $rules = [
            'title' => 'required|string|max:255',
            'date' => 'required|date_format:Y-m-d',
            'exercises' => 'required|array|min:1',
            'exercises.*.name' => 'required|string|max:255',
            'exercises.*.sets' => 'required|integer|min:1',
            'exercises.*.reps' => 'required|integer|min:1',
            'exercises.*.weight' => 'required|numeric|min:0',
        ];

        $validatedData = $request->validate($rules);

        $workout = Workout::create([
            'title' => $validatedData['title'],
            'date' => $validatedData['date'],
            'user_id' => auth()->user()->id,
        ]);

        foreach ($validatedData['exercises'] as $exerciseData) {
            $exercise = new Exercise($exerciseData);
            $workout->exercises()->save($exercise);
        }

        return redirect('/')->with('success', 'Workout created successfully!');
    }
}
