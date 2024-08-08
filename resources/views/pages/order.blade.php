@extends('layouts.dashboard', [
    'menuActive' => 'order'
])

@section('content')
    <div class="row mt-5">
        <div class="col-12">
            @include('components.message')
        </div>
    </div>
@endsection