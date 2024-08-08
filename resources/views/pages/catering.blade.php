@extends('layouts.dashboard', [
    'menuActive' => 'catering'
])

@section('content')
    <div class="row mt-5">
        <div class="col-12">
            @include('components.message')
        </div>
    </div>
    <div class="page-meta">
        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Catering</a></li>
            </ol>
        </nav>
    </div>
    <div class="row layout-top-spacing justify-content-between">
        <div class="col-lg-3 col-md-3 col-sm-3 mb-4">
            <form action="{{ route('catering') }}" method="GET">
                <input type="text" name="search" placeholder="Search" class="form-control" value="{{ request()->input('search') }}">
                <button class="btn btn-primary mt-3">Search</button>
            </form>
        </div>
    </div>
    <div class="row">
        @foreach($caterings as $catering)
            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-4 col-sm-6 mb-4">
                <div class="card style-6" href="{{ $catering->image_url }}">
                    <img src="{{ $catering->image_url }}" class="card-img-top" alt="catering">
                    <div class="card-footer">
                        <div class="row">
                            @if(!empty($catering->name))
                                <div class="col-12 mb-3">
                                    <b>{{ $catering->name }}</b>
                                </div>
                            @endif
                            @if(!empty($catering->contact))
                                <div class="col-12 mb-3">
                                    <p>{{ $catering->contact }}</p>
                                </div>
                            @endif
                            @if(!empty($catering->description))
                                <div class="col-12 mb-3">
                                    <p>{{ Str::limit($catering->description, 100) }}</p>
                                </div>
                            @endif
                            @if(!empty($catering->address))
                                <div class="col-12 mb-3">
                                    <p>{{ Str::limit($catering->address, 100) }}</p>
                                </div>
                            @endif
                            <div class="col-12 mb-3">
                                <a href="{{ route('catering.detail', $catering->id) }}" class="btn btn-primary w-100">Lihat Makanan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection