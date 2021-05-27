@extends('layouts.app')

@section('content')
    <h1>Cart Page</h1>
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
    @endif
@endsection