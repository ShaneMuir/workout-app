@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                       <h1 class="text-muted text-center mb-3">{{ __('Create Workout') }}</h1>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('workouts.store') }}">
                            @csrf

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group row mb-3">
                                <div class="col-6">
                                    <label for="title" class="visually-hidden">{{ __('Title') }}</label>
                                    <input id="title" placeholder="Workout Title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" required autocomplete="title" autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-6">
                                    <label for="date" class="visually-hidden">{{ __('Date') }}</label>
                                    <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ date('Y-m-d') }}" required autocomplete="date" autofocus>

                                    @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="exercisesContainer">
                                <div class="form-group row">
                                    <div class="col">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <label for="name" class="col-form-label text-md-right">{{ __('Exercise Name') }}</label>
                                            <a class="add-exercise" href ><img src="{{ asset('assets/add.svg') }}" width="16" height="16" alt="add more icon"></a>
                                        </div>
                                        <input id="name" placeholder="Bench Press" type="text" class="form-control @error('name') is-invalid @enderror" name="exercises[0][name]" value="{{ old('name.0') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col">
                                        <label for="sets" class="col-form-label text-md-right">{{ __('Sets') }}</label>
                                        <input id="sets" placeholder="4" type="number" class="form-control @error('sets') is-invalid @enderror" name="exercises[0][sets]" required autocomplete="sets" autofocus>

                                        @error('sets')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="col">
                                        <label for="reps" class="col-form-label text-md-right">{{ __('Reps') }}</label>
                                        <input id="reps" placeholder="10" type="number" class="form-control @error('reps') is-invalid @enderror" name="exercises[0][reps]" required autocomplete="reps" autofocus>

                                        @error('reps')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="col">
                                        <label for="weight" class="col-form-label text-md-right">{{ __('Weight (kg)') }}</label>
                                        <input id="weight" placeholder="100" type="number" class="form-control @error('weight') is-invalid @enderror" name="exercises[0][weight]" autocomplete="reps" autofocus>

                                        @error('reps')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0 mt-3">
                                <div class="col">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <a class="add-exercise btn btn-primary">
                                            {{ __('Add Exercise') }}
                                        </a>
                                        <button id="workoutSaveBtn" type="submit" class="btn btn-primary">
                                            {{ __('Save Workout') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
