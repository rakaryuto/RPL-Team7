<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Pack;
use App\Models\Product;
use App\Models\Size;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard');
    }
    public function myOrders()
    {
        $order = array();
        $i = 0;
        foreach (Order::where('user_id', Auth::user()->id)->get() as $item) {
            // orderid
            $order[$i]['id'] = $item->id;
            // status
            $order[$i]['status'] = $item->status;
            // nama
            $order[$i]['nama'] = $item->nama;
            // ongkir
            $order[$i]['ongkir'] = $item->ongkir;
            // harga
            $order[$i]['harga'] = $item->harga;
            // total tagihan = harga + ongkir
            $order[$i]['total'] = $item->harga + $item->ongkir;
            // whatsapp
            $order[$i]['whatsapp'] = $item->whatsapp;
            // email
            $order[$i]['email'] = $item->email;
            // alamat
            $order[$i]['alamat'] = $item->alamat;
            $j = 0;
            foreach (OrderProduct::where('order_id', $item->id)->get() as $item_prod) {
                // nama
                $order[$i]['prod'][$j]['nama'] = Coffee::where('id', Product::Where('id', $item_prod['product_id'])->first()->coffee_id)->first()->nama;
                // xtra
                $order[$i]['prod'][$j]['xtra'] = Product::Where('id', $item_prod['product_id'])->first()->extrashot;
                // size
                $order[$i]['prod'][$j]['size'] = Size::Where('id', Product::Where('id', $item_prod['product_id'])->first()->size_id)->first()->nama;
                // pack
                $order[$i]['prod'][$j]['pack'] = Pack::Where('id', Product::Where('id', $item_prod['product_id'])->first()->pack_id)->first()->nama;
                // qty
                $order[$i]['prod'][$j]['qty'] = $item_prod->jumlah;
                // harga n item
                $order[$i]['prod'][$j]['harga'] = Product::Where('id', $item_prod['product_id'])->first()->harga * $item_prod->jumlah;
                $j++;
            }
            $i++;
        }
        // dd($order);

        return view('user.orders', [
            'order' => $order,
        ]);
    }





    public function profile(Request $request)
    {
        // Ongkir
        $dekat  = 5000;
        $medium = 10000;
        $jauh   = 15000;
        $luar   = 30000;
        if ($request->jabodetabek == "dalam") {
            if ($request->kota == 'kota1') {
                $ongkir = $dekat;
            } else if ($request->kota == 'kota2') {
                $ongkir = $medium;
            } else if ($request->kota == 'kota3') {
                $ongkir = $jauh;
            }
        } else if ($request->jabodetabek == "luar") {
            $ongkir = $luar;
        }

        // Alamat
        $alamat = ucwords($request->kota);
        if ($request->kecamatan) {
            $alamat = $alamat . " " . ucwords($request->kecamatan);
        }
        if ($request->kelurahan) {
            $alamat = $alamat . " " . ucwords($request->kelurahan);
        }
        if ($request->alamat) {
            $alamat = $alamat . " " . ucwords($request->alamat);
        }
        if ($request->kodepos) {
            $alamat = $alamat . " " . $request->kodepos;
        }

        $user = User::find(Auth::user()->id);

        $user->whatsapp = $request->whatsapp;
        $user->alamat = $alamat;
        $user->ongkir = $ongkir;
        $user->save();

        return back()->with('success', 'Profil berhasil diupdate');
    }





    public function placeorder(Request $request)
    {
        $status     = 'pending';
        $user_id    = Auth::user()->id;
        $nama       = $request->nama;
        $harga      = 0;
        $ongkir     = 0;
        $whatsapp   = $request->whatsapp;
        $email      = Auth::user()->email;
        $alamat     = '';

        // Alamat
        $dekat  = 5000;
        $medium = 10000;
        $jauh   = 15000;
        $luar   = 30000;
        if (!Auth::user()->alamat) {
            // belom keisi
            $alamat = $nama . ' ' . $request->jabodetabek;
            $alamat = $alamat . ' ' . $request->kota;
            $alamat = $alamat . ' ' . $request->kecamatan;
            $alamat = $alamat . ' ' . $request->kelurahan;
            $alamat = $alamat . ' ' . $request->alamat;
            $alamat = $alamat . ' ' . $request->kodepos;
            if ($request->jabodetabek == "dalam") {
                if ($request->kota == 'kota1') {
                    $ongkir = $dekat;
                } else if ($request->kota == 'kota2') {
                    $ongkir = $medium;
                } else if ($request->kota == 'kota3') {
                    $ongkir = $jauh;
                }
            } else if ($request->jabodetabek == "luar") {
                $ongkir = $luar;
            }
        } else {
            if ($request->override) {
                // udah keisi tp override
                $alamat = $nama . ' ' . $request->jabodetabek;
                $alamat = $alamat . ' ' . $request->kota;
                $alamat = $alamat . ' ' . $request->kecamatan;
                $alamat = $alamat . ' ' . $request->kelurahan;
                $alamat = $alamat . ' ' . $request->alamat;
                $alamat = $alamat . ' ' . $request->kodepos;
                if ($request->jabodetabek == "dalam") {
                    if ($request->kota == 'kota1') {
                        $ongkir = $dekat;
                    } else if ($request->kota == 'kota2') {
                        $ongkir = $medium;
                    } else if ($request->kota == 'kota3') {
                        $ongkir = $jauh;
                    }
                } else if ($request->jabodetabek == "luar") {
                    $ongkir = $luar;
                }
            } else {
                // udah keisi
                $alamat = $nama . ' ' . Auth::user()->alamat;
                $ongkir = Auth::user()->ongkir;
            }
        }

        // Cek stock dan ngitung Harga
        foreach (session()->get('cart') as $item) {
            $check = Product::where('id', $item['id'])->first();
            
            if ($check->stock < $item['qty']) {
                $message = 'Stock produk '. Coffee::where('id', $check->coffee_id)->first()->nama . ' kurang (tersisa ' . $check->stock . ' produk) ';
                return back()->with('stock', $message);
            }
            $check->stock -= $item['qty'];
            $check->save();
            $harga += ($check->harga) * $item['qty'];
        }

        // Place order
        $order = Order::create([
            'status' => $status,
            'user_id' => $user_id,
            'nama' => $nama,
            'harga' => $harga,
            'ongkir' => $ongkir,
            'whatsapp' => $whatsapp,
            'email' => $email,
            'alamat' => $alamat,
        ]);

        // Input dr cart ke orderproducts
        foreach (session()->get('cart') as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'jumlah' => $item['qty'],
            ]);
        }

        session()->forget('cart');
        return redirect()->route('myOrders')->with('success', 'Order sudah dibuat');
    }
}
