<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use App\Models\Pack;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function test()
    {
        dd(session()->get('cart'));
    }

    public function indexCart()
    {
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
                $product[$i]['qty'] = session()->get('cart.' . $product[$i]['id'] . '.qty');                                        // quantity
                $product[$i]['harga'] = Product::Where('id', $item['id'])->first()->harga;                                          // harga
                $product[$i]['total'] = $product[$i]['qty'] * $product[$i]['harga'];                                                // harga n qty
                $total += $product[$i]['total'];
                $i++;
            }
            return view('cart', [
                'product' => $product,
                'total' => $total,
            ]);
        }
    }

    public function addCart(Request $request)
    {
        if ($request->quantity) {
            if ($request->extrashot) {
                $xtra = true;
            } else {
                $xtra = false;
            }

            $product = Product::where('coffee_id', $request->coffee)->where('size_id', $request->size)->where('pack_id', $request->pack)->where('extrashot', $xtra)->first();
            if ($product) {
                $qty = $request->quantity;
                $id = $product->id;

                if (session()->has('cart.' . $id)) {
                    $qty += session()->get('cart.' . $id . '.qty', $qty);
                    session()->put('cart.' . $id . '.qty', $qty);
                } else {
                    session()->put('cart.' . $id . '.id', $id);
                    session()->put('cart.' . $id . '.qty', $qty);
                }

                return redirect()->route('cart');
            }
            return back()->with('fail.prod', 'Produk Tak Ditemukan');
        }
        return back()->with('fail.prod', 'Quantity tidak boleh kosong');
    }

    public function delCart(Request $request)
    {
        session()->forget('cart.' . $request->delete);
        if (!session()->get('cart')) {
            session()->forget('cart');
        }
        return redirect()->route('cart')->with('success', 'Item berhasil dihapus');
    }

    public function delAllCart()
    {
        session()->forget('cart');
        return redirect()->route('cart')->with('success', 'Semua Item berhasil dihapus');
    }
}
