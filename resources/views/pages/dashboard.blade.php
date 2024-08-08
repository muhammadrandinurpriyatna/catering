@extends('layouts.dashboard', [
    'menuActive' => 'dashboard'
])

@section('content')
    <div class="row layout-top-spacing">
        <div class="col-md-12 layout-spacing">
            <h2 class="bg-white p-3">Selamat datang {{ Auth::user()->name }}</h2>
        </div>
    </div>
@endsection