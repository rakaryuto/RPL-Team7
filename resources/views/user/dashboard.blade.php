@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endsection

@section('content')
<div class="container">
    <h1>{{ Auth::user()->name }}'s Dashboard Page</h1>

    @if ( session()->has('success') )
    <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif
    @if ( session()->has('fail') )
        <div class="alert alert-danger">{{ session()->get('fail') }}</div>
    @endif

    <div class="accordion" id="accordionPanelsStayOpenExample">


        <div class="profile accordion-item">

            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                    aria-controls="panelsStayOpen-collapseTwo">
                    <div class="accordion-heading">
                        <img src="{{ asset('Asset/Profile.svg') }}" alt="cart logo" srcset="">
                        <h5>PROFILE</h5>
                    </div>
                </button>
            </h2>

            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show"
                aria-labelledby="panelsStayOpen-headingTwo">
                <div class="accordion-body">
                    <form action="{{ route('profileIdentity') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">NAME</label>
                            <div id="name" class="">{{ $user['nama'] }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">EMAIL</label>
                            <div id="email" class="">{{ $user['email'] }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="whatsapp" class="form-label">WHATSAPP</label>
                            <input type="tel" class="form-control" id="whatsapp" value="{{ $user['whatsapp'] }}"
                                placeholder="08xxxxxxxxxx" name="whatsapp">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-dark">Save Identity</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>


        <div class="address accordion-item">

            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                    aria-controls="panelsStayOpen-collapseThree">
                    <div class="accordion-heading">
                        <img src="{{ asset('Asset/Vector (2).svg') }}" alt="cart logo" srcset="">
                        <h5>ADDRESS</h5>
                    </div>
                </button>
            </h2>

            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show"
                aria-labelledby="panelsStayOpen-headingThree">
                <div class="accordion-body">
                    <form action="{{ route('profileAlamat') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="province" class="form-label">JABODETABEK</label>
                            <select name="jabodetabek" id="jabodetabek">
                                @if ($alamat['jabodetabek'])
                                    <option value="dalam" selected>Dalam Jabodetabek</option>
                                    <option value="luar">Luar Jabodetabek</option>
                                @else
                                    <option value="dalam">Dalam Jabodetabek</option>
                                    <option value="luar" selected>Luar Jabodetabek</option>
                                @endif
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="kota" class="form-label">CITY (KAB/KOTA)</label>
                            <select name="kota" id="kota">
                                <option value="kota1" <?php if (strtolower($alamat['kota']) == 'kota1') echo 'selected' ?>>Kota1</option>
                                <option value="kota2" <?php if (strtolower($alamat['kota']) == 'kota2') echo 'selected' ?>>Kota2</option>
                                <option value="kota3" <?php if (strtolower($alamat['kota']) == 'kota3') echo 'selected' ?>>Kota3</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="kecamatan" class="form-label">REGION (KEC.)</label>
                            <input type="text" class="form-control" id="kecamatan" name="kecamatan"
                                value="{{ $alamat['camat'] }}">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">STREET NAME</label>
                            <input type="text" class="form-control" name="alamat" id="alamat"
                                value="{{ $alamat['jalan'] }}">
                        </div>
                        <div class="mb-3">
                            <label for="kodepos" class="form-label">POST CODE (KODE POS)</label>
                            <input type="text" class="form-control" id="kodepos" name="kodepos"
                                value="{{ $alamat['kodepos'] }}">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-dark">Save Address</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>


    </div>
</div>
@endsection
