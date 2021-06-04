@extends('layouts.adminapp')

@section('title')

<title>Products - Admin Kopikimo</title>
    
@endsection

@section('content')

<h1 class="text-center">Products</h1>

<div id="container" class="text-center">
    <table style="width: 100%">
    
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Pack</th>
            <th>Size</th>
            <th>Extrashot</th>
            <th>Stock</th>
            <th>Price</th>
            <th></th>
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
                <td><a href="/admin/products/{{ $item->id }}"><button>Edit</button></a></td>
            </tr>
        @endforeach
        
    </table>
    </div>
    
@endsection
