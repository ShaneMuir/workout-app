@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="toast align-items-center show border-primary mb-4" role="alert" aria-live="polite" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <div class="alert alert-success text-primary">
                        {{ session('success') }}Success
                    </div>
                </div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col">
            @if(Auth::user())
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h1 class="text-muted text-center m-0">Workouts</h1>
                    @if(Route::has('workouts.create'))
                    <a class="btn btn-primary" href="{{ route('workouts.create') }}">Create Workout</a>
                    @endif
                </div>

            @endif

            @foreach ($workouts as $workout)
                <div class="card border m-1">
                    <div class="card-header" id="heading-{{ $workout->id }}">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed d-flex justify-content-between w-100 align-items-center" type="button" data-bs-toggle="collapse"  data-bs-target="#workout-{{ $workout->id }}" aria-expanded="false" aria-controls="workout-{{ $workout->id }}">
                                <span>
                                    {{ date('M d', strtotime($workout->date)) }}
                                </span>
                                <span>
                                    {{ $workout->title }}
                                </span>
                            </button>
                        </h2>
                    </div>

                    <div id="workout-{{ $workout->id }}" class="collapse exercises-row" aria-labelledby="heading-{{ $workout->id }}" data-bs-parent="#heading-{{ $workout->id }}">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Exercise Name</th>
                                    <th>Sets</th>
                                    <th>Reps</th>
                                    <th>Weight (kg)</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($workout->exercises as $exercise)
                                    <tr>
                                        <td>{{ $exercise->name }}</td>
                                        <td>{{ $exercise->sets }}</td>
                                        <td>{{ $exercise->reps }}</td>
                                        <td>{{ $exercise->weight }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
@endsection
