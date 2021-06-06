@extends('layouts.adminapp')

@section('title')

<title>Orders - Admin Kopikimo</title>
    
@endsection

@section('content')

<style>
    th, td {
        border: 1px solid black;
    }
</style>

<h1 class="text-center">Orders</h1>

<div id="container" class="text-center">
    <table style="width: 100%">
    
        <tr>
            <th>Order ID</th>
            <th>User ID</th>
            <th>Name</th>
            <th>Whatsapp No.</th>
            <th>Email</th>
            <th>Address</th>
            <th>Items</th>
            <th>Subtotal</th>
            <th>Postage</th>
            <th>Total</th>
            <th>Payment Slip</th>
            <th>Status</th>
        </tr>
    
        
        @foreach ($orders as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->user_id}}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->whatsapp }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->alamat }}</td>
                <td>
                    <ol>
                        @foreach ($order_product as $items)
                            @if ($item->id == $items->order_id)
                                @foreach ($products as $prod)
                                    @if ($items->product_id == $prod->id)
                                        <li>{{ $coffees->where('id', $prod->coffee_id)->first()->nama }} | {{ $packs->where('id', $prod->pack_id)->first()->nama }} | {{ $sizes->where('id', $prod->pack_id)->first()->nama }}@if ($prod->extrashot)
                                            | Extrashot 
                                        @endif
                                        | {{ $items->jumlah }}
                                        </li>    
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </ol>
                </td>
                <td>{{ $item->harga }}</td>
                <td>{{ $item->ongkir }}</td>
                <td>{{ $item->harga + $item->ongkir }}</td>
                <td></td>
                <td>
                    @if ($item->status == "waiting")
                        <form action="/admin/orders/{{ $item->id }}" method="post">
                            @method('patch')
                            @csrf
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <input type="hidden" name="status" value="Confirmed">
                            <input type="submit" name="confirm" value="Confirm">
                        </form>
                        <br>
                        <form action="/admin/orders/{{ $item->id }}" method="post">
                            @method('patch')
                            @csrf
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <input type="hidden" name="status" value="Rejected">
                            <input type="submit" name="confirm" value="Reject">
                        </form>
                    @elseif ($item->status == "Sent")
                        Sent
                    @else
                        {{ $item->status }}
                        <form action="/admin/orders/{{ $item->id }}" method="post">
                            @method('patch')
                            @csrf
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <input type="hidden" name="status" value="waiting">
                            <input type="submit" name="confirm" value="Cancel">
                        </form>
                        @if ($item->status == "Confirmed") 
                        <form action="/admin/orders/{{ $item->id }}" method="post">
                            @method('patch')
                            @csrf
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <input type="hidden" name="status" value="Sent">
                            <input type="submit" name="confirm" value="Sent">
                        </form>
                        @endif
                    @endif
                </td>
            </tr>
        @endforeach
        
    </table>
    </div>
    
@endsection
