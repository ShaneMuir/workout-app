@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-muted text-center mb-3">{{ __('Edit Workout') }}</h1>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('workouts.update', $workout->id) }}">
                            @csrf
                            @method('PUT')

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
                                    <input id="title" placeholder="Workout Title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" required autocomplete="title" autofocus value="{{ $workout->title }}">

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-6">
                                    <label for="date" class="visually-hidden">{{ __('Date') }}</label>
                                    <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ $workout->date }}" required autocomplete="date" autofocus>

                                    @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="exercisesContainer">
                                @foreach ($workout->exercises as $key => $exercise)
                                    <div class="form-group row">
                                        <div class="col">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <label for="name-{{ $key }}" class="col-form-label text-md-right">{{ __('Exercise Name') }}</label>
                                                @if ($key == 0)
                                                    <a class="add-exercise" href><img src="{{ asset('assets/add.svg') }}" width="16" height="16" alt="add more icon"></a>
                                                @else
                                                    <a class="remove-exercise" href><img src="{{ asset('assets/remove.svg') }}" width="16" height="16" alt="remove icon"></a>
                                                @endif
                                            </div>
                                            <input id="name-{{ $key }}" type="text" class="form-control @error('name') is-invalid @enderror" name="exercises[{{ $key }}][name]" value="{{ old('name.' . $key, $exercise->name) }}" required autocomplete="name" autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col">
                                            <label for="sets-{{ $key }}" class="col-form-label text-md-right">{{ __('Sets') }}</label>
                                            <input id="sets-{{ $key }}" type="text" class="form-control @error('sets') is-invalid @enderror" name="exercises[{{ $key }}][sets]" value="{{ old('exercises.' . $key . '.sets', $exercise->sets) }}" required autocomplete="name" autofocus>

                                            @error('sets')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col">
                                            <label for="reps-{{ $key }}" class="col-form-label text-md-right">{{ __('Reps') }}</label>
                                            <input id="reps-{{ $key }}" type="text" class="form-control @error('reps') is-invalid @enderror" name="exercises[{{ $key }}][reps]" value="{{ old('exercises.' . $key . '.reps', $exercise->reps) }}" required autocomplete="name" autofocus>

                                            @error('reps')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col">
                                            <label for="weight-{{ $key }}" class="col-form-label text-md-right">{{ __('Weight (kg)') }}</label>
                                            <input id="weight-{{ $key }}" type="text" class="form-control @error('weight') is-invalid @enderror" name="exercises[{{ $key }}][weight]" value="{{ old('exercises.' . $key . '.weight', $exercise->weight) }}" autocomplete="name" autofocus>

                                            @error('reps')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                @endforeach
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
