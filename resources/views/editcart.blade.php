@extends('layouts.app')

@section('content')
<div class="container">

    <h1>
        Edit {{ $nama }}
        @if ($xtra)
        With Extra Shot
        @endif
    </h1>


    <form action="{{ route('cart.edit') }}" method="POST">
        @csrf
        <input type="hidden" name="coffee" id="coffee" value="{{ $kopi }}">
        <input type="hidden" name="cart" id="cart" value="{{ $id }}">
        <div class="d-flex mt-5">
            
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
                <input type="number" id="quantity" name="quantity" value="{{ $qty }}" min="1" max="5">
            </div>
        
        </div>

        <button type="submit" class="btn btn-dark mt-5">Save Changes</button>
    </form>

</div>

<script>
    // asldapd
</script>
@endsection