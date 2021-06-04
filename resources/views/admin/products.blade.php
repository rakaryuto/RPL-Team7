@extends('layouts.adminapp')

@section('title')

<title>Products - Admin Kopikimo</title>

@endsection

@section('content')

<style>
    th, td {
        border: 1px solid black;
    }
</style>

<h1 class="text-center">Products</h1>



<table style="width:100%">
    <tr>
        <th>Product ID</th>
        <th>Nama Kopi</th>
        <th>Kemasan</th>
        <th>Ukuran</th>
        <th>Extrashot</th>
        <th>Stock</th>
        <th>Harga</th>
    </tr>
    @foreach ($products as $item)
    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $coffees->where('id', $item->coffee_id)->first()->nama }}</td>
        <td>{{ $packs->where('id', $item->pack_id)->first()->nama }}</td>
        <td>{{ $sizes->where('id', $item->size_id)->first()->nama }}</td>
        <td>
            @if ($item->extrashot)
                Pake
            @else
                Ngga Pake
            @endif
        </td>
        <td>{{ $item->stock }}</td>
        <td>{{ $item->harga }}</td>
    </tr>
    @endforeach
</table>
@endsection