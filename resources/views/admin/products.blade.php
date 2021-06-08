@extends('layouts.adminapp')

@section('title')

<title>Products - Admin Kopikimo</title>
    
@endsection

@section('content')

<style>
    th, td {
        border: 1px solid black;
        padding: 1em;
    }

    table {
        width: 100%;
    }
</style>

<h1 class="text-center">Products</h1>

<div id="container" class="text-center">
    @if (session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif
    @if (session()->has('fail'))
        <div class="alert alert-danger">{{ session()->get('fail') }}</div>
    @endif

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Pack</th>
            <th>Size</th>
            <th>Extrashot</th>
            <th>Stock</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        
        @foreach ($products as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $coffees->where('id', $item->coffee_id)->first()->nama }}</td>
                <td>{{ $packs->where('id', $item->pack_id)->first()->nama }}</td>
                <td>{{ $sizes->where('id', $item->size_id)->first()->nama }}</td>
                <td>
                    @if ($item->extrashot)
                        Yes
                    @else
                        No
                @endif
                </td>
                <td>{{ $item->stock }}</td>
                <td>{{ $item->harga }}</td>
                <td><a href="/admin/products/{{ $item->id }}"><button class="btn btn-dark">Edit</button></a></td>
            </tr>
        @endforeach
    </table>

    <div style="height: 2em"></div>
</div>
    
@endsection
