@extends('layouts.dashboard', [
    'menuActive' => 'menu'
])

@section('before-head-end')
    <link href="{{ asset('assets/css/light/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .image-container {
            position: relative;
            display: inline-block;
            width: 150px;
            height: 150px;
        }

        .image-container img {
            object-fit: cover;
            width: 100%;
            height:100%;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            cursor: pointer;
            z-index: 10;
            width: 150px;
            height: 150px;
        }

        .overlay-text {
            font-size: 16px;
            font-weight: bold;
        }

        .image-container:hover .overlay {
            opacity: 1;
        }

        .d-none {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="row mt-5">
        <div class="col-12">
            @include('components.message')
        </div>
    </div>
    <div class="page-meta">
        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('menu') }}">Menu</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
    </div>
    <div class="account-settings-container layout-top-spacing">
        <div class="account-content">
            <div class="tab-content" id="animateLineContent-4">
                <div class="tab-pane fade show active" id="animated-underline-home" role="tabpanel" aria-labelledby="animated-underline-home-tab">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <form action="{{ route('menu.edit', $menu->id) }}" method="post" class="section general-info" enctype="multipart/form-data">
                                @csrf
                                <div class="info">
                                    <div class="row">
                                        <div class="col-lg-12 mx-auto">
                                            <div class="d-flex justify-content-center my-4">
                                                <div class="image-container">
                                                    <img class="rounded-circle" id="profileImage" src="{{ $menu->image_url }}" alt="">
                                                    <input type="file" name="image" id="imageInput" class="align-self-center mx-3 ps-5 d-none">
                                                    <div class="overlay rounded-circle d-none" id="overlay" onclick="document.getElementById('imageInput').click();">
                                                        <span class="overlay-text">Change</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-xl-12 col-lg-12 col-md-12 mt-md-0 my-4">
                                                    <div class="form">
                                                        <div class="row">
                                                            <div class="col-md-6 my-2">
                                                                <div class="form-group">
                                                                    <label>Menu Name</label>
                                                                    <input type="text" class="form-control mb-3" name="name" value="{{ $menu->name }}" required disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 my-2">
                                                                <div class="form-group">
                                                                    <label>Price</label>
                                                                    <input type="number" class="form-control mb-3" name="price" value="{{ $menu->price }}" required disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 my-2">
                                                                <div class="form-group">
                                                                    <label>Description</label>
                                                                    <textarea class="form-control" name="description" value="{{ $menu->description }}" required disabled>{{ $menu->description }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 my-2">
                                                                <div class="form-group text-end">
                                                                    <button class="btn btn-secondary" id="editBtn" type="button">Edit</button>
                                                                    <button class="btn btn-secondary d-none" id="cancelBtn" type="button">Cancel</button>
                                                                    <button class="btn btn-secondary d-none" id="saveBtn" type="submit">Save</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('before-body-end')
    <script>
        document.getElementById('imageInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profileImage').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        document.getElementById('editBtn').addEventListener('click', function() {
            document.querySelectorAll('input[name="name"], input[name="price"], textarea[name="description"]').forEach(input => input.disabled = false);
            document.getElementById('editBtn').classList.add('d-none');
            document.getElementById('cancelBtn').classList.remove('d-none');
            document.getElementById('saveBtn').classList.remove('d-none');
            document.getElementById('overlay').classList.remove('d-none');
        });

        document.getElementById('cancelBtn').addEventListener('click', function() {
            document.querySelectorAll('input[name="name"], input[name="contact"], textarea[name="address"]').forEach(input => input.disabled = true);
            document.getElementById('editBtn').classList.remove('d-none');
            document.getElementById('cancelBtn').classList.add('d-none');
            document.getElementById('saveBtn').classList.add('d-none');
            document.getElementById('overlay').classList.add('d-none');
        });
    </script>
@endsection