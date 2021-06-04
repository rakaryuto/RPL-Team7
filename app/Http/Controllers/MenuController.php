<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use App\Models\Pack;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function index()
    {
        return view('index', [
            'products' => Product::all(),
            'coffees' => Coffee::all(),
        ]);
    }
    
    public function indexProduct($id)
    {
        return view('layouts.product', [
            'id'        => $id,
            'name'      => Coffee::where('id', $id)->first()->nama,
            'desc'      => Coffee::where('id', $id)->first()->deskripsi,
            'products'  => Product::where('coffee_id', $id)->get(),
            'sizes'     => Size::all(),
            'packs'     => Pack::all(),
        ]);
    }
    
    
    
    
    
    
    public function checkout()
    {
        if (Auth::user()) {
            if (session()->has('cart')) {
                $product = array();
                $total = 0;
                $i = 0;
                foreach (session()->get('cart') as $item) {
                    $product[$i]['id'] = $item['id'];   // product id
                    $product[$i]['nama'] = Coffee::Where('id', Product::Where('id', $item['id'])->first()->coffee_id)->first()->nama;   // nama kopi
                    $product[$i]['xtra'] = Product::Where('id', $item['id'])->first()->extrashot;                                       // xtrashot
                    $product[$i]['size'] = Size::Where('id', Product::Where('id', $item['id'])->first()->size_id)->first()->nama;       // size
                    $product[$i]['pack'] = Pack::Where('id', Product::Where('id', $item['id'])->first()->pack_id)->first()->nama;       // pack
                    $product[$i]['qty'] = session()->get('cart.'.$product[$i]['id'].'.qty');                                            // quantity
                    $product[$i]['harga'] = Product::Where('id', $item['id'])->first()->harga;                                          // harga
                    $product[$i]['total'] = $product[$i]['qty'] * $product[$i]['harga'];                                                // harga n qty
                    $total += $product[$i]['total'];
                    $i++;
                }
                return view('user.checkout', [
                    'user' => Auth::user(),
                    'product' => $product,
                    'total' => $total,
                ]);
            }
            return redirect()->route('menu')->with('fail', 'Cart masih kosong');
        }
        return redirect()->route('login')->with('fail', 'Please login first');
    }
    
}
