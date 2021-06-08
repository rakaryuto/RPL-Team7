@extends('layouts.adminapp')

@section('title')
<title>Order ID {{ $order->id }}</title>
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

<div class="text-center mb-5">
    <h1>Order ID {{ $order->id }}</h1>
    <div>Status : <span class="fw-bold">{{ ucwords($order->status) }}</span></div>
</div>

<form action="{{ route('admin.editOrder') }}" method="post" class="container">
    @csrf
    <input type="hidden" name="id" value="{{ $order->id }}">

    <table class="mb-5">
        <tr>
            <th>Order ID</th>
            <th>User ID</th>
            <th>Nama Pembeli</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Whatsapp</th>
            <th>Biaya Pengiriman</th>
        </tr>
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->user_id }}</td>
            <td>{{ Auth::user()->name }}</td>
            <td><a href="mailto:{{ $order->email }}">{{ $order->email }}</a></td>
            <td>{{ $order->alamat }}</td>
            <td><a href="https://wa.me/+62{{ $order->whatsapp }}">{{ $order->whatsapp }}</a></td>
            <td>{{ number_format($order->ongkir) }}</td>
        </tr>
    </table>

    <table class="mb-5">
        <tr>
            <th>Nama Produk</th>
            <th>Kemasan</th>
            <th>Ukuran</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
        </tr>
        @foreach ($orderproducts as $item_prod)    
            <tr>
                <td>{{ $item_prod['nama'] }}</td>
                <td>{{ $item_prod['size'] }}</td>
                <td>{{ $item_prod['pack'] }}</td>
                <td>{{ $item_prod['qty'] }}</td>
                <td>{{ number_format($item_prod['harga']) }}</td>
            </tr>
        @endforeach
    </table>

    <div class="mb-5">
        <div>
            <span class="fw-bold">Subtotal : </span>
            {{ number_format($order->harga) }}
        </div>
        <div>
            <span class="fw-bold">Ongkir : </span>
            {{ number_format($order->ongkir) }}
        </div>
        <div>
            <span class="fw-bold">Total Pembayaran : </span>
            {{ number_format($order->ongkir + $order->harga) }}
        </div>
    </div>

    {{-- status = pending, waiting, processing, done --}}
    <div class="d-flex flex-column">
        @if (strtolower($order->status) == "waiting")
            <img src="{{ url('/admin/orders/trf/' . $order->id) }}" alt="file fotonya broken">
            <input type="hidden" name="current" value="processing">
            <button type="submit" class="btn btn-dark flex-fill mt-5" onclick="return confirm('yakin?')">Terima Bukti Pembayaran</button>
        @elseif (strtolower($order->status) == "processing")
            <input type="hidden" name="current" value="done">
            <button type="submit" class="btn btn-dark flex-fill">Tandai Selesai</button>
        @endif
    </div>

    <div style="height: 5em"></div>
</form>
@endsection
