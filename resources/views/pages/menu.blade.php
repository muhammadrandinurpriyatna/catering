@extends('layouts.dashboard', [
    'menuActive' => 'menu'
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
                <li class="breadcrumb-item"><a href="#">Menu</a></li>
            </ol>
        </nav>
    </div>
    <div class="row layout-top-spacing">
        <div class="col-lg-3 col-md-3 col-sm-3 mb-4">
            <a href="{{ route('menu.add') }}" class="btn btn-primary">Add Menu</a>
        </div>
    </div>
    <div class="row">
        @foreach($menus as $menu)
            <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card style-6" href="{{ $menu->image_url }}">
                    <img src="{{ $menu->image_url }}" class="card-img-top" alt="Makanan">
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <b>{{ $menu->name }}</b>
                            </div>
                            <div class="col-12 mb-3">
                                <p>{{ Str::limit($menu->description, 100) }}</p>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="pricing">
                                    <p class="text-success mb-0">Rp. {{ number_format($menu->price, 0, ',', '.') }}</p>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-primary w-100">Edit</a>
                            </div>
                            <div class="col-12 mb-3">
                                <a href="#" class="btn btn-danger w-100">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
