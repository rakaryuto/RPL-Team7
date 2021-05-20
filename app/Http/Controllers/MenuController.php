<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use App\Models\Pack;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        return view('menu', [
            'products' => Product::all(),
            'coffees' => Coffee::all(),
        ]);
    }

    public function indexProduct($id)
    {
        return view('layouts.product', [
            'name'      => Coffee::where('id', $id)->first()->nama,
            'desc'      => Coffee::where('id', $id)->first()->deskripsi,
            'products'  => Product::where('coffee_id', $id)->get(),
            'sizes'     => Size::all(),
            'packs'     => Pack::all(),
        ]);
    }
}
