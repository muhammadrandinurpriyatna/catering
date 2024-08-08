@extends('layouts.dashboard', ['menuActive' => 'cart'])

@section('before-head-end')
    <link href="{{ asset('assets/css/light/apps/invoice-preview.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="row invoice layout-top-spacing layout-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="doc-container">
                <form action="{{ route('cart.order') }}" method="post" class="row">
                    @csrf
                    <div class="col-xl-9">
                        <div class="invoice-container">
                            <div class="invoice-inbox">
                                <div id="ct" class="">
                                    <div class="invoice-00001">
                                        <div class="content-section">
                                            <div class="inv--product-table-section">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Menu</th>
                                                                <th class="text-end" scope="col">Quantity</th>
                                                                <th class="text-end" scope="col">Price</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($carts as $cart)
                                                                <tr>
                                                                    <td>{{ $cart->menu->name }}</td>
                                                                    <td class="text-end">{{ $cart->qty }}</td>
                                                                    <td class="text-end">Rp. {{ number_format($cart->price, 0, ',', '.') }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="inv--total-amounts">
                                                <div class="row mt-4">
                                                    <div class="col-sm-5 col-12 order-sm-0 order-1"></div>
                                                    <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                        <div class="text-sm-end">
                                                            <div class="row">
                                                            <div class="col-sm-8 col-7">
                                                                    <p class="">Total Quantity :</p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">{{ number_format($totalQty, 0, ',', '.') }}</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="">Total Price :</p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">Rp. {{ number_format($totalPrice, 0, ',', '.') }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="invoice-actions-btn">
                            <div class="invoice-action-btn">
                                <div class="row">
                                    <div class="col-xl-12 col-md-3 col-sm-6 my-3">
                                        <label>Tanggal Pengiriman</label>
                                        <input type="date" name="date" class="form-control" required>
                                        <input type="hidden" name="name" class="form-control" value="{{ $menuNames }}" required>
                                        <input type="hidden" name="qty" class="form-control" value="{{ $totalPrice }}" required>
                                        <input type="hidden" name="price" class="form-control" value="{{ $totalQty }}" required>
                                    </div>
                                    <div class="col-xl-12 col-md-3 col-sm-6 my-3">
                                        <button class="btn btn-secondary btn-print action-print">Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection