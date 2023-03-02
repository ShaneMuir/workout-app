@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            @if(Auth::user()->name)
            <h1>Welcome {{ Auth::user()->name }}</h1>
            @endif
        </div>
    </div>
</div>
@endsection
