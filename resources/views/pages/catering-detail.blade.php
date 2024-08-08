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
                <li class="breadcrumb-item"><a href="{{ route('catering') }}">Catering</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail</li>
            </ol>
        </nav>
    </div>
    <div class="row mt-3">
        @foreach($caterings as $catering)
            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-4 col-sm-6 mb-4">
                <div class="card style-6" href="{{ $catering->image_url }}">
                    <img src="{{ $catering->image_url }}" class="card-img-top" alt="Makanan">
                    <div class="card-footer">
                        <form action="{{ route('cart.add', $catering->id) }}" method="post" class="row">
                            @csrf
                            <div class="col-12 mb-3">
                                <b>{{ $catering->name }}</b>
                            </div>
                            <div class="col-12 mb-3">
                                <p>{{ Str::limit($catering->description, 100) }}</p>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="pricing">
                                    <p class="text-success mb-0">Rp. {{ number_format($catering->price, 0, ',', '.') }}</p>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <input type="number" class="form-control" placeholder="Quantity" name="qty" required min="1">
                            </div>
                            <div class="col-12 mb-3">
                                <button class="btn btn-success w-100">Add to cart</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
