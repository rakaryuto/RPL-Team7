@extends('layouts.adminapp')

@foreach ($products as $item)
@section('title')

<title>{{ $coffees->where('id', $item->coffee_id)->first()->nama }}</title>
    
@endsection

@section('content')

<h1 class="text-center">Edit Products</h1>

<form method="post" style="width: 100%">
    @csrf

    <input type="hidden" name="id" value="{{$item->id}}">

    <div>
        <label for="name">Name</label><br>
        <input type="text" name="name" id="name" required value="{{ $coffees->where('id', $item->coffee_id)->first()->nama }}">
    </div> <br>
    <div>
        <label for="desc">Description</label><br>
        <textarea name="desc" id="desc" style="width: 50%">{{ $coffees->where('id', $item->coffee_id)->first()->deskripsi }}</textarea>
    </div><br>
    <div>
        <label for="stock">Stocks</label><br>
        <input type="number" name="stocks" id="stocks" required value="{{$item->stock}}">
    </div><br>
    <div>
        <label for="price">Price</label><br>
        <input type="number" name="price" id="price" required value="{{$item->harga}}">
    </div><br>
    <div>
        <input type="submit" name="edit" value="Save">
    </div><br>
    
</form>
@endsection
@endforeach
