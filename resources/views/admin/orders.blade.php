@extends('layouts.adminapp')

@section('title')

<title>Orders - Admin Kopikimo</title>
    
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

<h1 class="text-center">Orders</h1>

<div id="container" class="text-center">
    @if (session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif
    @if (session()->has('fail'))
        <div class="alert alert-danger">{{ session()->get('fail') }}</div>
    @endif

    <table>
        <tr>
            <th>Order ID</th>
            <th>User ID</th>
            <th>Status</th>
            <th>Name</th>
            <th>Address</th>
            <th>Total</th>
            <th>Actions</th>
        </tr>
        
        @foreach ($orders as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->user_id }}</td>
            <td>{{ ucwords($item->status) }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->alamat }}</td>
            <td>{{ number_format($item->harga + $item->ongkir) }}</td>
            <td><a href="/admin/orders/{{ $item->id }}" class="btn btn-link">Details</a></td>
        </tr>
        @endforeach
    </table>

    <div style="height: 2em"></div>
</div>
@endsection
