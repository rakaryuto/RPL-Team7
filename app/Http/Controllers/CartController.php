<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use App\Models\Pack;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function test() {
        dd(session()->get('cart'));
    }

    public function indexCart() {
        return view('cart', [
            'products' => Product::all(),
            'coffee' => Coffee::all(),
            'size' => Size::all(),
            'pack' => Pack::all(),
        ]);
    }

    public function addCart(Request $request)
    {
        if ($request->extrashot) {
            $xtra = true;
        } else {
            $xtra = false;
        }

        $product = Product::where('coffee_id', $request->coffee)->where('size_id', $request->size)->where('pack_id', $request->pack)->where('extrashot', $xtra)->first();
        if ($product) {

            $qty = $request->quantity;
            $id = $product->id;

            if ( session()->has('cart.'.$id) ) {
                $qty += session()->get('cart.'.$id.'.qty', $qty);
                session()->put('cart.'.$id.'.qty', $qty);
            } else {
                session()->put('cart.'.$id.'.id', $id);
                session()->put('cart.'.$id.'.qty', $qty);
            }

            return redirect()->route('cart');
        }
        return back()->with('fail.prod', 'Produk Tak Ditemukan');
    }

    public function delCart(Request $request) {
        session()->forget('cart.'.$request->delete);
        return redirect()->route('cart')->with('success', 'Item berhasil dihapus');
    }

    public function delAllCart() {
        session()->forget('cart');
        return redirect()->route('cart')->with('success', 'Semua Item berhasil dihapus');
    }
}
