@extends('layouts.app')

@section('content')
<div class="container">
    <h1>My Orders Page</h1>
    @if ( session()->has('success') )
        <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif
    @if ( session()->has('fail') )
        <div class="alert alert-danger">{{ session()->get('fail') }}</div>
    @endif


    @if ($order)
        {{-- My Orders --}}
        @foreach ($order as $item)
        <div class="order" style="border: 1px solid black; padding: 1em; margin: 1em;">
            
            <div><span style="font-weight: bold">Order ID :</span> {{ $item['id'] }}</div>                  {{-- order_id --}}
            <div><span style="font-weight: bold">Status :</span> {{ $item['status'] }}</div>                {{-- status --}}
            <div><span style="font-weight: bold">Nama Penerima :</span> {{ $item['nama'] }}</div>           {{-- atas nama --}}
            <div><span style="font-weight: bold">Alamat :</span> {{ $item['alamat'] }}</div>                {{-- alamat --}}
            <div><span style="font-weight: bold">Whatsapp :</span> {{ $item['whatsapp'] }}</div>            {{-- whatsapp --}}
            <div><span style="font-weight: bold">Email :</span> {{ $item['email'] }}</div>                  {{-- email --}}
            
            {{-- ----loop---- --}}
            @foreach ($item['prod'] as $item_prod)
            <div class="order_prod" style="border: 1px solid black; padding: 0 1em 1em 1em; margin: 1em 0">
                <div>
                    <h2 style="margin-bottom: 0">
                        {{ $item_prod['nama'] }}                                                            {{-- nama --}}
                        @if ($item_prod['xtra'])                                                            {{-- xtra --}}
                        With Extra Shot
                        @endif
                    </h2>

                    <div>Size : {{ $item_prod['size'] }}</div>                                              {{-- size --}}
                    <div>Pack : {{ $item_prod['pack'] }}</div>                                              {{-- pack --}}
                    <div>Quantity : {{ $item_prod['qty'] }}</div>                                           {{-- qty --}}
                    <div>Harga {{ $item_prod['qty'] }} produk : {{ $item_prod['harga'] }}</div>             {{-- harga n prod --}}
                </div>
            </div>
            @endforeach

            <div><span style="font-weight: bold">Subtotal :</span> {{ $item['harga'] }}</div>               {{-- subtotal --}}
            <div><span style="font-weight: bold">Biaya Pengiriman :</span> {{ $item['ongkir'] }}</div>      {{-- ongkir --}}
            <div><span style="font-weight: bold">Total Tagihan :</span> {{ $item['total'] }}</div>          {{-- total tagihan --}}
            
            @if ($item['trf'])
                <div class="text-center fw-bold">Order is currently processed</div>
            @else
                <div class="d-flex justify-content-around">
                    <div class="flex-fill">
                        <form action="{{ route('uploadtrf') }}" method="POST" enctype="multipart/form-data" class="d-flex flex-column"> {{-- upload --}}
                            @csrf
                            <input type="hidden" name="id" value="{{ $item['id'] }}">
                            <input type="hidden" name="status" value="{{ $item['status'] }}">
                            <label for="trf" class="fw-bold">Upload Bukti Transfer</label>
                            <input type="file" id="trf" name="trf" class="my-3">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </form>
                    </div>
                    <div class="flex-fill">
                        <a href="/order/cancel/{{ $item['id'] }}" class="btn btn-danger d-flex justify-content-center">Cancel Order</a> {{-- cancel order --}}
                    </div>
                </div>
            @endif

        </div>
        @endforeach

    @else
        There is currently no Orders
    @endif
</div>
@endsection