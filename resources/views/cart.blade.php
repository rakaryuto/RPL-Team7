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
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                    <div class="accordion-heading">
                        <img src="{{ asset('asset/Profile.svg') }}" alt="cart logo" srcset="">
                        <h5>PROFILE</h5>
                    </div>
                </button>
              </h2>
              <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                <div class="accordion-body">
                    <label for="Username">NAME</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="mb-3">
                        <label for="email">EMAIL</label>
                        <input type="email" class="form-control" id="email" placeholder="name@example.com">
                    </div>
                </div>
              </div>
            </div>
            <div class="address accordion-item">
              <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                    <div class="accordion-heading">
                        <img src="{{ asset('asset/Vector (2).svg') }}" alt="cart logo" srcset="">
                        <h5>ADDRESS</h5>
                    </div>
                </button>
              </h2>
              <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                <div class="accordion-body">
                  <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
              </div>
            </div>

            <div class="cart accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    <div class="accordion-heading">
                      <img src="{{ asset('asset/Profile.svg') }}" alt="cart logo" srcset="">
                      <h5>PAYMENT CONFIRMATION</h5>
                    </div>
                  </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                  <div class="accordion-body">
                      
                  </div>
                </div>
              </div>

          </div>
        </div>
    </div>
    
</section>
    {{-- <h1>Cart Page</h1>
    @if ( session()->has('success') )
        <div>{{ session()->get('success') }}</div>
    @endif

    @if ( session()->has('cart') )
        @for($i=0;$i<=$products->count();$i++)   @if(session()->has('cart.'.$i))
        <div style="border: 1px solid black; padding: .5em;">
            <h2 style="margin: 0;">
                {{ $coffee->where('id', $products->where('id', $i)->first()->coffee_id)->first()->nama }}
                @if ($products->where('id', $i)->first()->extrashot)
                    With Extra Shot
                @endif
            </h2>

            <p>Size : {{ $size->where('id', $products->where('id', $i)->first()->size_id)->first()->nama }}</p>
            <p>Pack : {{ $pack->where('id', $products->where('id', $i)->first()->pack_id)->first()->nama }}</p>
            <p>Quantity : {{ session()->get('cart.'.$i.'.qty') }}</p>
            
            <form action={{ route('cart.del') }} method="POST">
                @csrf
                <input type="hidden" name="delete" value="{{ session()->get('cart.'.$i.'.id') }}">
                <button type="submit">Delete Item</button>
            </form>
        </div>
        @endif   @endfor

        
        <div style="margin: 1em 0">
            <a href={{ route('checkout') }}>Checkout</a>
        </div>
        <div style="margin: 1em 0">
            <a href={{ route('cart.delall') }}>Clear Cart</a>
        </div>
    @else
    
    Cart Kosong
    @endif --}}
@endsection