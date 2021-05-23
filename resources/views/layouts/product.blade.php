@extends('layouts.app')

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

@section('content')
<h1 style="text-transform: capitalize">{{ $name }}</h1>
<p>{{ $desc }}</p>

@if (session()->has('fail.prod'))
    <div style="color: red">
        {{ session()->get('fail.prod') }}
    </div>
@endif

<form action={{ route('cart.add') }} method="POST">
    @csrf

{{-- Coffee --}}
    <input type="hidden" name="coffee" value={{ $products->first()->coffee_id }}>
    <div>

{{-- Size --}}
        @foreach ($products->groupBy('size_id') as $size)
        <div>
            <input type="radio" name="size" value="{{ $size->first()->size_id }}" id="size{{ $size->first()->size_id }}">
            <label for="size{{ $size->first()->size_id }}">
                {{ $sizes->where('id', $size->first()->size_id)->first()->nama }}
            </label>
            
            <div class="sub1">

{{-- Packs --}}
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

{{-- Extrashot --}}
    @if ($products->where('extrashot', 1)->first())        
    <div>
        <input type="checkbox" name="extrashot" id="extrashot">
        <label for="extrashot">With Extra Shot</label>
    </div>
    @endif

{{-- Quantity --}}
    <div>
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" id="quantity" min="1" max="5" required>
    </div>

    <button type="submit">Add To Cart</button>
</form>
@endsection
