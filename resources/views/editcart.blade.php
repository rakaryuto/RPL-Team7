@extends('layouts.app')

@section('content')
    <h1>
        Edit {{ $nama }}
        @if ($xtra)
        With Extra Shot
        @endif
    </h1>
    <div class="d-flex mt-4">
        <div class="flex-fill">
            <h4 class="fw-bold">BOTTLE</h4>
            <fieldset id="bottle-custom-choose">
                @foreach ($products->groupBy('pack_id') as $item)
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="pack"
                        value="{{ $item->first()->pack_id }}" id="pack{{ $item->first()->pack_id }}" <?php if ( strtolower($all_pack->where('id', $item->first()->pack_id)->first()->nama) == strtolower($pack) ) echo 'checked' ?> >
                    <label class="form-check-label" for="pack{{ $item->first()->pack_id }}">
                        {{ $all_pack->where('id', $item->first()->pack_id)->first()->nama }}
                    </label>
                </div>
                @endforeach
            </fieldset>
        </div>
        <div class="flex-fill">
            <h4 class="fw-bold">SIZE</h4>
            <fieldset id="size-custom-choose">
                @foreach ($products->groupBy('size_id') as $item)
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="size"
                        value="{{ $item->first()->size_id }}" id="size{{ $item->first()->size_id }}" <?php if ( strtolower($all_size->where('id', $item->first()->size_id)->first()->nama) == strtolower($size) ) echo 'checked' ?> >
                    <label class="form-check-label" for="size{{ $item->first()->size_id }}">
                        {{ $all_size->where('id', $item->first()->size_id)->first()->nama }}
                    </label>
                </div>
                @endforeach
            </fieldset>
        </div>
        <div class="flex-fill">
            <h4 class="fw-bold">QUANTITY</h4>
            <input type="number" value="{{ $qty }}" min="1" max="5" id="qty">
        </div>
        <div class="flex-fill">
            <h4 class="fw-bold">PRICE</h4>
            <div id="harga"> {{ $harga }}</div>
        </div>
    </div>
@endsection
{{-- TINGGAL SCRIPT HARGA --}}