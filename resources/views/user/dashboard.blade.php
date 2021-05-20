@extends('layouts.app')

@section('content')
    <h1>{{ Auth::user()->name }}'s Dashboard Page</h1>

    <h2 style="margin: 1em 0 0 0">Profile</h2>
    @if ( session()->has('success') )
        <div style="color: green">{{ session()->get('success') }}</div>
    @endif
    <form action="{{ route('profile') }}" method="POST">
        @csrf
        <div>
            <div>Nama : {{ Auth::user()->name }}</div>
            <div>Email : {{ Auth::user()->email }}</div>

            <div>
                <label for="whatsapp">Whatsapp : </label>
                <input type="text" name="whatsapp" value="@if (Auth::user()->whatsapp){{ Auth::user()->whatsapp }}@endif">
                <span>@error('whatsapp'){{ $message }}@enderror</span>
            </div>

            <h4 style="margin: 1em 0 0 0">Alamat</h4>
            @if (Auth::user()->alamat)
            <div>{{ Auth::user()->alamat }}</div>
            @endif

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
            <div>
                <button type="submit">Save</button>
            </div>
        </div>
    </form>
@endsection