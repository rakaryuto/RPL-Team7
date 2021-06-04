@extends('layouts.app')

@section('title')
    {{ $name }} - Kopikimo
@endsection

@section('head')
<link rel="stylesheet" href="{{ asset('css/product.css') }}">
@endsection

@section('content')
<section id="landing">
    <div class="banner container">
        <div class="row content">


            <div class="col-lg-6 textbox justify-content-center">
                <form action={{ route('cart.add') }} method="POST">
                    @csrf
                    <h3>{{ strtoupper($name) }}</h3>
                    <p>{{ $desc }}</p>
                    <input type="hidden" name="coffee" value="{{$id}}">

                    @if (session()->has('fail'))
                        <div class="alert alert-danger">{{ session()->get('fail') }}</div>
                    @endif
                    
                    {{-- Web View --}}
                    <div class="adjusment">
                        
                        {{-- Pack --}}
                        <div class="bottle-custom">
                            <p>BOTTLE</p>
                            <fieldset id="bottle-custom-choose">
                                @foreach ($products->groupBy('pack_id') as $item)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pack"
                                        value="{{ $item->first()->pack_id }}" id="pack{{ $item->first()->pack_id }}">
                                    <label class="form-check-label" for="pack{{ $item->first()->pack_id }}">
                                        {{ $packs->where('id', $item->first()->pack_id)->first()->nama }}
                                    </label>
                                </div>
                                @endforeach
                            </fieldset>
                        </div>
                        
                        {{-- Size --}}
                        <div class="size-custom">
                            <p>SIZE</p>
                            <fieldset id="size-custom-choose">
                                @foreach ($products->groupBy('size_id') as $size)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="size"
                                        value="{{ $size->first()->size_id }}" id="size{{ $size->first()->size_id }}">
                                    <label class="form-check-label" for="size{{ $size->first()->size_id }}">
                                        {{ $sizes->where('id', $size->first()->size_id)->first()->nama }}
                                    </label>
                                </div>
                                @endforeach
                            </fieldset>
                        </div>
                        
                        {{-- ExtraShot --}}
                        <div class="shot-custom">
                            @if ($products->where('extrashot', 1)->first())
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="extrashot" id="extrashot">
                                <label class="form-check-label" for="extrashot">With Extra Shot</label>
                            </div>
                            @endif
                            <div class="mt-3">
                                <label for="quantity">QUANTITY</label>
                                <input type="number" name="quantity" id="quantity" min="1" max="5">
                            </div>
                        </div>
                    </div>

                    
                    {{-- Phone View --}}
                    <div class="adjustment-md">
                        
                        {{-- Pack --}}
                        <div class="input-group bottle-input mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">BOTTLE</label>
                            <select class="form-select" id="inputGroupSelect01">
                                <option selected>Options...</option>
                                @foreach ($products->groupBy('pack_id') as $item)
                                    <option value="{{ $item->first()->pack_id }}">{{ $packs->where('id', $item->first()->pack_id)->first()->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        {{-- Size --}}
                        <div class="input-group size-input mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">SIZE</label>
                            <select class="form-select" id="inputGroupSelect01">
                                <option selected>Options...</option>
                                @foreach ($products->groupBy('size_id') as $size)
                                    <option value="{{ $size->first()->size_id }}">{{ $sizes->where('id', $size->first()->size_id)->first()->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        {{-- ExtraShot --}}
                        <div class="input-group shots-input mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">EXTRA SHOT</label>
                            <select class="form-select" id="inputGroupSelect01">
                                @if ($products->where('extrashot', 1)->first())
                                <option selected>Options...</option>
                                <option value="YES">YES</option>
                                @else
                                <option value="" disabled>Unavailable</option>
                                @endif
                            </select>
                        </div>
                        
                        {{-- Quantity --}}
                        <div class="input-group shots-input mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">QUANTITY</label>
                            <input type="number" id="inputGroupSelect01" min="1" max="5">
                        </div>
                    </div>

                    <div class="textbox-button">
                        {{-- <div class="productsum-button btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="add btn btn-dark">-</button>
                            <div class="amount"><p>1</p></div>
                            <button type="button" class="add btn btn-dark">+</button>
                        </div> --}}
                        <button type="submit" class="addtocart-button"> ADD TO CART </button>
                    </div>
                </form>
            </div>


            <div class="imgbox col-lg-6 text-center">
                <img src="{{ asset('asset/'.$name.'.png') }}" class="img-fluid" alt="" srcset="">
            </div>


            <div class="contact">
                <a href="" class="whatsapp">
                    <img src="{{ asset('asset/WhatsApp.svg') }}" alt="" srcset="">
                </a>
                <a href="https://www.instagram.com/officialkopikimo/" class="instagram">
                    <img src="{{ asset('asset/Vector (1).svg') }}" alt="" srcset="">
                </a>
                <a href="" class="twitter">
                    <img class="twitter-img" src="{{ asset('asset/Vector (2).svg') }}" alt="" srcset="">
                </a>
            </div>


        </div>
    </div>
    <div style="height: 1rem"></div>
</section>
@endsection