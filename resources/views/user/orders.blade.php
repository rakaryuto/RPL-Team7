@extends('layouts.app')

@section('content')
<h1>My Orders Page</h1>
@if ( session()->has('success') )
<div>{{ session()->get('success') }}</div>
@endif
@if ( session()->has('fail') )
<div style="color: red">{{ session()->get('fail') }}</div>
@endif

<form action="{{ route('cancelorder') }}" method="POST">
    {{-- My Orders --}}
    @foreach ($order as $item)
    <input type="hidden" name="orderid" value="{{ $item['id'] }}">
    <div class="order" style="border: 1px solid black; padding: 1em; margin: 1em;">
        {{-- order_id --}}
        <div><span style="font-weight: bold">Order ID :</span> {{ $item['id'] }}</div>
        {{-- status --}}
        <div><span style="font-weight: bold">Status :</span> {{ $item['status'] }}</div>
        {{-- atas nama --}}
        <div><span style="font-weight: bold">Nama Penerima :</span> {{ $item['nama'] }}</div>
        {{-- alamat --}}
        <div><span style="font-weight: bold">Alamat :</span> {{ $item['alamat'] }}</div>
        {{-- whatsapp --}}
        <div><span style="font-weight: bold">Whatsapp :</span> {{ $item['whatsapp'] }}</div>
        {{-- email --}}
        <div><span style="font-weight: bold">Email :</span> {{ $item['email'] }}</div>
        {{-- ----loop---- --}}
        @foreach ($item['prod'] as $item_prod)
        <div class="order_prod" style="border: 1px solid black; padding: 0 1em 1em 1em; margin: 1em 0">
            <div>
                {{-- nama --}}
                <h2 style="margin-bottom: 0">
                    {{ $item_prod['nama'] }}
                    {{-- xtra --}}
                    @if ($item_prod['xtra'])
                    With Extra Shot
                    @endif
                </h2>

                {{-- size --}}
                <div>Size : {{ $item_prod['size'] }}</div>
                {{-- pack --}}
                <div>Pack : {{ $item_prod['pack'] }}</div>
                {{-- qty --}}
                <div>Quantity : {{ $item_prod['qty'] }}</div>
                {{-- harga n prod --}}
                <div>Harga {{ $item_prod['qty'] }} produk : {{ $item_prod['harga'] }}</div>
            </div>
        </div>
        @endforeach
        {{-- subtotal --}}
        <div><span style="font-weight: bold">Subtotal :</span> {{ $item['harga'] }}</div>
        {{-- ongkir --}}
        <div><span style="font-weight: bold">Biaya Pengiriman :</span> {{ $item['ongkir'] }}</div>
        {{-- total tagihan --}}
        <div><span style="font-weight: bold">Total Tagihan :</span> {{ $item['total'] }}</div>
    </div>
    @endforeach
</form>
@endsection