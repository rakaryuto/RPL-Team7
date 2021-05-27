@extends('layouts.app')

@section('head')
<style>
    .sub1 {
        display: none;
    }

    :checked~.sub1 {
        display: block;
        margin-left: 40px;
    }
</style>
@endsection

@section('content')
    <form action="{{ route('placeorder') }}" method="POST">
        @csrf
        <div>

            {{-- Identity --}}
            <div>
                <label for="nama"><h2>Nama : </h2></label>
                <input type="text" name="nama" value="@if ($user->name){{ $user->name }}@endif">
                <span>@error('nama'){{ $message }}@enderror</span>
            </div>
            <div><h2>Email : </h2>{{ $user->email }}</div>
            <div>
                <label for="whatsapp"><h2>Whatsapp : </h2></label>
                <input type="text" name="whatsapp" value="@if ($user->whatsapp){{ $user->whatsapp }}@endif">
                <span>@error('whatsapp'){{ $message }}@enderror</span>
            </div>

            {{-- Alamat --}}
            <h2>Alamat Kirim</h2>
            @if ($user->alamat)
            <div>{{ $user->alamat }}</div>
            <div>Ongkos Kirim : {{ $user->ongkir }}</div>
            <input type="checkbox" name="override" id="override">
            <label for="override">Beda Alamat Kirim?</label>
            <div class="sub1">
                <div>
                    <select name="jabodetabek" id="jabodetabek">
                        <option value="dalam">Dalam Jabodetabek</option>
                        <option value="luar">Luar Jabodetabek</option>
                    </select>
                </div>
                <div>
                    <select name="kota" id="kota">
                        <option value="kota1">kota1</option>
                        <option value="kota2">kota2</option>
                        <option value="kota3">kota3</option>
                    </select>
                </div>
                <div>
                    <label for="kecamatan">Kecamatan : </label>
                    <input type="text" name="kecamatan">
                    <span>@error('kecamatan'){{ $message }}@enderror</span>
                </div>
                <div>
                    <label for="kelurahan">Kelurahan : </label>
                    <input type="text" name="kelurahan">
                    <span>@error('kelurahan'){{ $message }}@enderror</span>
                </div>
                <div>
                    <label for="kodepos">Kodepos : </label>
                    <input type="text" name="kodepos">
                    <span>@error('kodepos'){{ $message }}@enderror</span>
                </div>
                <div>
                    <label for="alamat">Alamat : </label>
                    <input type="text" name="alamat">
                    <span>@error('alamat'){{ $message }}@enderror</span>
                </div>
            </div>
            @else

            <div>
                <div>
                    <select name="jabodetabek" id="jabodetabek">
                        <option value="dalam">Dalam Jabodetabek</option>
                        <option value="luar">Luar Jabodetabek</option>
                    </select>
                </div>
                <div>
                    <select name="kota" id="kota">
                        <option value="kota1">kota1</option>
                        <option value="kota2">kota2</option>
                        <option value="kota3">kota3</option>
                    </select>
                </div>
                <div>
                    <label for="kecamatan">Kecamatan : </label>
                    <input type="text" name="kecamatan">
                    <span>@error('kecamatan'){{ $message }}@enderror</span>
                </div>
                <div>
                    <label for="kelurahan">Kelurahan : </label>
                    <input type="text" name="kelurahan">
                    <span>@error('kelurahan'){{ $message }}@enderror</span>
                </div>
                <div>
                    <label for="kodepos">Kodepos : </label>
                    <input type="text" name="kodepos">
                    <span>@error('kodepos'){{ $message }}@enderror</span>
                </div>
                <div>
                    <label for="alamat">Alamat : </label>
                    <input type="text" name="alamat">
                    <span>@error('alamat'){{ $message }}@enderror</span>
                </div>
            </div>
            @endif
            

            {{-- Product Recap --}}
            <hr>
            @if ( session()->has('stock') )
                <div style="color: red">{{ session()->get('stock') }}</div>
            @endif

            @foreach ($product as $item)
            <div>
                <h2 style="margin-bottom: 0">
                    {{ $item['nama'] }}
                    @if ($item['xtra'])
                        With Extra Shot
                    @endif
                </h2>

                <div>Size : {{ $item['size'] }}</div>
                <div>Pack : {{ $item['pack'] }}</div>
                <div>Quantity : {{ $item['qty'] }}</div>
                <div>Harga {{ $item['qty'] }} produk : {{ $item['total'] }}</div>
            </div>
            @endforeach
            <h3>Subtotal : {{ $total }}</h3>
            @if ($user->ongkir)
                <h3>Biaya Pengiriman : {{ $user->ongkir }}</h3>
                <h3>Total Tagihan : {{ $total + $user->ongkir }}</h3>
            @endif

            {{-- Confirmation --}}
            <hr>
            <p>Are you sure you want to checkout?</p>
            <div>
                <button type="submit">Proceed</button> <a href={{ route('cart') }}>Change Cart</a>
            </div>
        </div>
    </form>
@endsection