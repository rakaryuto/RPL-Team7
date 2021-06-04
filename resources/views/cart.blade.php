@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endsection

@section('content')
<section id="landing">
    <div class="container">
        <div class="accordion" id="accordionPanelsStayOpenExample">
            
            
            
            
            <div class="profile accordion-item">
                
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseTwo">
                        <div class="accordion-heading">
                            <img src="{{ asset('Asset/Profile.svg') }}" alt="cart logo" srcset="">
                            <h5>PROFILE</h5>
                        </div>
                    </button>
                </h2>

                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                    aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">NAME</label>
                            <input type="text" class="form-control" id="name" placeholder="customer's name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">EMAIL</label>
                            <input type="email" class="form-control" id="email" placeholder="email@gmail.com">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">PHONE NUMBER</label>
                            <input type="tel" class="form-control" id="phone" placeholder="">
                        </div>
                    </div>
                </div>
                
            </div>




            <div class="address accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseThree">
                        <div class="accordion-heading">
                            <img src="{{ asset('Asset/Vector (2).svg') }}" alt="cart logo" srcset="">
                            <h5>ADDRESS</h5>
                        </div>
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                    aria-labelledby="panelsStayOpen-headingThree">
                    <div class="accordion-body">
                        <div class="mb-3">
                            <label for="street" class="form-label">STREET NAME</label>
                            <textarea class="form-control" id="street" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="region" class="form-label">REGION (KEC.)</label>
                            <input type="text" class="form-control" id="region">
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">CITY (KAB/KOTA)</label>
                            <input type="text" class="form-control" id="city">
                        </div>
                        <div class="mb-3">
                            <label for="province" class="form-label">PROVINCE</label>
                            <input type="text" class="form-control" id="province">
                        </div>
                        <div class="mb-3">
                            <label for="postcode" class="form-label">POST CODE (KODE POS)</label>
                            <input type="text" class="form-control" id="postcode">
                        </div>
                    </div>
                </div>
            </div>




            <div class="cart accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                        aria-controls="panelsStayOpen-collapseOne">
                        <div class="accordion-heading">
                            <img src="Asset/Profile.svg" alt="cart logo" srcset="">
                            <h5>PAYMENT CONFIRMATION</h5>
                        </div>
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                    aria-labelledby="panelsStayOpen-headingOne">
                    <div class="payment accordion-body">

                        @foreach ($product as $item)
                        <div class="product-spect-bar">
                            <div class="product-spect-name">
                                <h4>
                                    {{ $item['nama'] }}
                                    @if ($item['xtra'])
                                    With Extra Shot
                                    @endif
                                </h4>
                                <p>
                                    BOTTLE : {{ $item['pack'] }} |
                                    SIZE : {{ $item['size'] }}
                                </p>
                            </div>
                            <div class="product-spect-price">
                                <div class="product-price">
                                    <p>{{ number_format($item['total']) }}</p>
                                    <div class="productsum-button btn-group" role="group" aria-label="Basic example">
                                        Quantity : {{ $item['qty'] }}
                                        {{-- <button type="button" class="add minus btn btn-dark">-</button> --}}
                                        {{-- <input type="number" class="amount" name="qty" value="{{ $item['qty'] }}"
                                        min="1" max="5"> --}}
                                        {{-- <button type="button" class="add plus btn btn-dark">+</button> --}}
                                    </div>
                                </div>
                                <a href="cart/edit/{{ $item['id'] }}"><button>EDIT</button></a>
                            </div>
                        </div>
                        <hr>
                        @endforeach

                        <div class="total-bar">
                            <div class="total-price-bar">
                                Subtotal : <span class="total-price">{{ number_format($total) }}</span>
                            </div>
                            @if (Auth::user())
                            @if (Auth::user()->ongkir)
                            <div class="postal-fee-bar">
                                Postal Fee : <span class="postal-fee">{{ number_format(Auth::user()->ongkir) }}</span>
                            </div>
                            <div class="total-payment-bar">
                                Total Payment : <span
                                    class="total-payment">{{ number_format($total + Auth::user()->ongkir) }}</span>
                            </div>
                            @else
                            Postal Fee isnt Defined yet
                            @endif
                            @else
                            You have not Logged in yet
                            @endif
                            <button class=" btn btn-dark checkout mt-5">Checkout</button>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>
</section>
@endsection