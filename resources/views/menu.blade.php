@extends('layouts.app')

@section('content')
    <h1>Menu Page</h1>

    @foreach ($coffees as $item)
        <a href="/product/{{ $item->id }}">
            <h2> {{ $item->nama }} </h2>
            Stock : {{ $products->where('coffee_id', $item->id)->sum('stock') }}
        </a>
    @endforeach
@endsection