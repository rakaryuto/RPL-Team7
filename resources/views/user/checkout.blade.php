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
            
            <hr>
            <div class="container d-flex flex-column flex-lg-row">
                {{-- Identity --}}
                <div class="flex-fill">
                    <h2>Identitas</h2>
                    <div>
                        <label for="nama">Nama : </label>
                        <input type="text" name="nama" value="@if ($user->name){{ $user->name }}@endif">
                        <span>@error('nama'){{ $message }}@enderror</span>
                    </div>
                    <div>Email : {{ $user->email }}</div>
                    <div>
                        <label for="whatsapp">Whatsapp : </label>
                        <input type="text" name="whatsapp" value="@if ($user->whatsapp){{ $user->whatsapp }}@endif">
                        <span>@error('whatsapp'){{ $message }}@enderror</span>
                    </div>
                </div>
    
                {{-- Alamat --}}
                <div class="flex-fill mt-5 mt-lg-0">
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
                </div>
                
            </div>
            

            {{-- Product Recap --}}
            <hr>
            <div class="container">
                @if ( session()->has('stock') )
                    <div style="color: red">{{ session()->get('stock') }}</div>
                @endif
    
                <h2 style="margin: 0">Product Recap</h2>
                @foreach ($product as $item)
                <div class="m-3 border border-dark">
                    <h5 class="fw-bold">
                        {{ $item['nama'] }}
                        @if ($item['xtra'])
                            With Extra Shot
                        @endif
                    </h5>
    
                    <div>Size : {{ $item['size'] }}</div>
                    <div>Pack : {{ $item['pack'] }}</div>
                    <div>Quantity : {{ $item['qty'] }}</div>
                    <div>Harga {{ $item['qty'] }} produk : {{ $item['total'] }}</div>
                </div>
                @endforeach
                <div class="fw-bold">Subtotal : {{ $total }}</div>
                @if ($user->ongkir)
                    <div class="fw-bold">Biaya Pengiriman : {{ $user->ongkir }}</div>
                    <div class="fw-bold">Total Tagihan : {{ $total + $user->ongkir }}</div>
                @endif
            </div>

            {{-- Confirmation --}}
            <hr>
            <div class="container d-flex flex-column justify-content-center">
                <p>Are you sure you want to checkout?</p>
                <div>
                    <button type="submit">Proceed</button> <a href={{ route('cart') }}>Change Cart</a>
                </div>
            </div>
        </div>
    </form>
@endsection