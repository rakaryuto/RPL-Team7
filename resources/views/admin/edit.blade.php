@extends('layouts.adminapp')

@foreach ($products as $item)
@section('title')

<title>{{ $coffees->where('id', $item->coffee_id)->first()->nama }}</title>
    
@endsection

@section('content')

<h1 class="text-center">Edit Products</h1>

<form method="post">
    @csrf

    <input type="hidden" name="id" value="{{$item->id}}">

    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required value="{{ $coffees->where('id', $item->coffee_id)->first()->nama }}">
    </div> <br>
    <div>
        <label for="desc">Description</label>
        <input type="text" name="desc" id="desc" value="{{ $coffees->where('id', $item->coffee_id)->first()->deskripsi }}">
    </div><br>
    <div>
        <label for="stock">Stocks</label>
        <input type="number" name="stocks" id="stocks" required value="{{$item->stock}}">
    </div><br>
    <div>
        <label for="price">Price</label>
        <input type="number" name="price" id="price" required value="{{$item->harga}}">
    </div><br>
    <div>
        <input type="submit" name="edit" value="Save">
    </div><br>
    
</form>
@endsection
@endforeach
