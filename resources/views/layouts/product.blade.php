@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
@endsection

@section('content')
<section id="landing">
    <div class="banner container">
        <div class="row content">


            <div class="col-lg-6 textbox justify-content-center">
                <h3>PREMIUM AREN LATTE</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos nobis ea qui animi recusandae, molestias quas ratione quod debitis. Voluptate modi exercitationem harum in. Doloremque ut ea ipsa repellendus neque.</p>
                <div class="adjusment">
                    <div class="bottle-custom">
                        <p>BOTTLE</p>
                        <fieldset id="bottle-custom-choose">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="bottle-choose" id="bottle-choose-pet">
                                <label class="form-check-label" for="bottle-choose-pet">
                                  PET
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="bottle-choose" id="bottle-choose-eco">
                                <label class="form-check-label" for="bottle-choose-eco">
                                  ECO
                                </label>
                            </div>
                        </fieldset>   
                    </div>
                    <div class="size-custom">
                        <p>SIZE</p>
                        <fieldset id="size-custom-choose">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="size-choose" id="size-choose-350">
                                <label class="form-check-label" for="size-choose-350">
                                  350 mL
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="size-choose" id="size-choose-500">
                                <label class="form-check-label" for="size-choose-500">
                                  0.5 L
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="size-choose" id="size-choose-1">
                                <label class="form-check-label" for="size-choose-1">
                                  1 L
                                </label>
                              </div>
                        </fieldset>   
                    </div>
                    <div class="shot-custom">
                        <p>EXTRA SHOT</p>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                              YES
                            </label>
                        </div>
                    </div>
                </div>
                
                <div class="adjustment-md">
                    <div class="input-group bottle-input mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">BOTTLE</label>
                        <select class="form-select" id="inputGroupSelect01">
                          <option selected>Option...</option>
                          <option value="bottle-choose-pet">PET</option>
                          <option value="bottle-choose-eco">ECO</option>
                        </select>
                    </div>
                    <div class="input-group size-input mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">SIZE</label>
                        <select class="form-select" id="inputGroupSelect01">
                          <option selected>Option...</option>
                          <option value="size-choose-350">350 mL</option>
                          <option value="size-choose-500">0.5 L</option>
                          <option value="size-choose-1">1 L</option>
                        </select>
                    </div>  
                    <div class="input-group shots-input mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">EXTRA SHOT</label>
                        <select class="form-select" id="inputGroupSelect01">
                          <option selected>Option...</option>
                          <option value="YES">YES</option>
                        </select>
                    </div>                                                                                        
                </div>
                <div class="textbox-button">
                    <button class="addtocart-button"> ADD TO CART </button>
                    <button class="buynow-button"> BUY NOW </button>
                </div>
            </div>


            <div class="imgbox col-lg-6 text-center">
                <img src="{{ asset('asset/Photo.svg') }}" alt="" srcset="">          
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
</section>
@endsection





{{--
@section('head')
<style>
    .sub1 {
        display: none;
    }

    :checked~.sub1 {
        display: block;
        margin-left: 40px;
    }
</style>
@endsection
--}}

{{--
@section('unused')
<h1 style="text-transform: capitalize">{{ $name }}</h1>
<p>{{ $desc }}</p>

@if (session()->has('fail.prod'))
    <div style="color: red">
        {{ session()->get('fail.prod') }}
    </div>
@endif

<form action={{ route('cart.add') }} method="POST">
    @csrf

Coffee
    <input type="hidden" name="coffee" value={{ $products->first()->coffee_id }}>
    <div>

Size
        @foreach ($products->groupBy('size_id') as $size)
        <div>
            <input type="radio" name="size" value="{{ $size->first()->size_id }}" id="size{{ $size->first()->size_id }}">
            <label for="size{{ $size->first()->size_id }}">
                {{ $sizes->where('id', $size->first()->size_id)->first()->nama }}
            </label>
            
            <div class="sub1">

Packs
                @foreach ($size->groupBy('pack_id') as $item)
                <div>
                    <input type="radio" name="pack" value="{{ $item->first()->pack_id }}" id="pack{{ $item->first()->pack_id }}">
                    <label for="pack{{ $item->first()->pack_id }}">
                        {{ $packs->where('id', $item->first()->pack_id)->first()->nama }}
                    </label>
                </div>
                @endforeach

            </div>
        </div>
        @endforeach
    </div>

Extrashot
    @if ($products->where('extrashot', 1)->first())        
    <div>
        <input type="checkbox" name="extrashot" id="extrashot">
        <label for="extrashot">With Extra Shot</label>
    </div>
    @endif

Quantity
    <div>
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" id="quantity" min="1" max="5" required>
    </div>

    <button type="submit">Add To Cart</button>
</form>
@endsection
--}}