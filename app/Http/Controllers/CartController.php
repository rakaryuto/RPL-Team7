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
        $product = null;
        $total = null;
        $alamat = null;
        $user = null;

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
        }

        if (Auth::user()) {
            $user['nama'] = Auth::user()->name;
            $user['email'] = Auth::user()->email;
            $user['whatsapp'] = Auth::user()->whatsapp;
        }

        if (Auth::user()->alamat && Auth::user()->ongkir) {
            $data = explode(' ', Auth::user()->alamat);
            // JABODETABEK
            if (Auth::user()->ongkir >= 20000) {$alamat['jabodetabek'] = 1;}
            else {$alamat['jabodetabek'] = 0;}
            // KOTA
            $alamat['kota'] = $data[0];
            // KECAMATAN
            $alamat['camat'] = $data[1];
            // KODE POS
            $alamat['kodepos'] = $data[count($data)-1];
            // JALAN
            $alamat['jalan'] = '';
            for ($i=2; $i < count($data)-1; $i++) { $alamat['jalan'] = $alamat['jalan'] . " " . $data[$i]; }
        }

        return view('cart', [
            'product' => $product,
            'total' => $total,
            'alamat' => $alamat,
            'user' => $user,
        ]);
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
            return back()->with('fail', 'Produk Tak Ditemukan');
        }
        return back()->with('fail', 'Quantity tidak boleh kosong');
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

    public function editCart($id)
    {
        $nama = '';
        $xtra = '';
        $pack = '';
        $size = '';
        $qty = '';
        $products = '';

        if (session()->has('cart.' . $id)){
            $products = Product::where('coffee_id', Product::where('id', $id)->first()->coffee_id)->get();
            $nama = Coffee::Where('id', Product::Where('id', $id)->first()->coffee_id)->first()->nama;  // nama kopi
            $xtra = Product::Where('id', $id)->first()->extrashot;                                      // xtrashot
            $size = Size::Where('id', Product::Where('id', $id)->first()->size_id)->first()->nama;      // size
            $pack = Pack::Where('id', Product::Where('id', $id)->first()->pack_id)->first()->nama;      // pack
            $qty = session()->get('cart.' . $id . '.qty');                                              // quantity
            $harga = Product::Where('id', $id)->first()->harga;                                         // harga
        }

        return view('editcart',[
            'products' => $products,
            'all_size'     => Size::all(),
            'all_pack'     => Pack::all(),
            'nama' => $nama,
            'xtra' => $xtra,
            'pack' => $pack,
            'size' => $size,
            'qty' => $qty,
            'harga' => $harga,
        ]);
    }
}
