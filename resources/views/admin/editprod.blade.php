@extends('layouts.adminapp')

@section('title')
<title>Product ID {{ $item->id }}</title>
@endsection

@section('content')

<style>
    th, td {
        border: 1px solid black;
        padding: 1em;
    }

    table, form {
        width: 100%;
    }

</style>

<h1 class="text-center mb-5">Product ID {{ $item->id }}</h1>

<form action="{{ route('admin.editProduct') }}" method="post" class="container">
    @csrf
    <input type="hidden" name="id" value="{{ $item->id }}">

    <table class="mb-5">
        <tr>
            <th>Nama Kopi</th>
            <th>Kemasan</th>
            <th>Ukuran</th>
        </tr>
        <tr>
            <td>{{ $nama }}</td>
            <td>{{ $pack }}</td>
            <td>{{ $size }}</td>
        </tr>
    </table>

    <div class="d-flex mb-5">
        <div class="d-flex flex-column flex-fill px-1">
            <label class="fw-bold" for="stock">Stocks</label>
            <input type="text" name="stock" id="stock" value="{{ $item->stock }}" placeholder="" required>
        </div>
        <div class="d-flex flex-column flex-fill px-1">
            <label class="fw-bold" for="price">Price</label>
            <input type="text" name="harga" id="harga" value="{{ $item->harga }}" placeholder="" required>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-dark">Save</button>
    </div>
</form>
@endsection
