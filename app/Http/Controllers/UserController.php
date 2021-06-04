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
use Illuminate\Support\Facades\Storage;

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
            $order[$i]['id'] = $item->id;                           // orderid
            $order[$i]['status'] = $item->status;                   // status
            $order[$i]['nama'] = $item->nama;                       // nama
            $order[$i]['ongkir'] = $item->ongkir;                   // ongkir
            $order[$i]['harga'] = $item->harga;                     // harga
            $order[$i]['total'] = $item->harga + $item->ongkir;     // total tagihan = harga + ongkir
            $order[$i]['whatsapp'] = $item->whatsapp;               // whatsapp
            $order[$i]['email'] = $item->email;                     // email
            $order[$i]['alamat'] = $item->alamat;                   // alamat
            $j = 0;
            foreach (OrderProduct::where('order_id', $item->id)->get() as $item_prod) {
                $order[$i]['prod'][$j]['nama'] = Coffee::where('id', Product::Where('id', $item_prod['product_id'])->first()->coffee_id)->first()->nama;    // nama
                $order[$i]['prod'][$j]['xtra'] = Product::Where('id', $item_prod['product_id'])->first()->extrashot;                                        // xtra
                $order[$i]['prod'][$j]['size'] = Size::Where('id', Product::Where('id', $item_prod['product_id'])->first()->size_id)->first()->nama;        // size
                $order[$i]['prod'][$j]['pack'] = Pack::Where('id', Product::Where('id', $item_prod['product_id'])->first()->pack_id)->first()->nama;        // pack
                $order[$i]['prod'][$j]['qty'] = $item_prod->jumlah;                                                                                         // qty
                $order[$i]['prod'][$j]['harga'] = Product::Where('id', $item_prod['product_id'])->first()->harga * $item_prod->jumlah;                      // harga n item
                $j++;
            }

            $order[$i]['trf'] = null;
            if ( Storage::exists('trf/' . Auth::user()->id . '-order' . $order[$i]['id'] . '.jpg') )        {$order[$i]['trf'] = 1;}
            else if (Storage::exists('trf/' . Auth::user()->id . '-order' . $order[$i]['id'] . '.jpeg'))    {$order[$i]['trf'] = 1;}
            else if (Storage::exists('trf/' . Auth::user()->id . '-order' . $order[$i]['id'] . '.png'))     {$order[$i]['trf'] = 1;}
            else if (Storage::exists('trf/' . Auth::user()->id . '-order' . $order[$i]['id'] . '.bmp'))     {$order[$i]['trf'] = 1;}
            else if (Storage::exists('trf/' . Auth::user()->id . '-order' . $order[$i]['id'] . '.gif'))     {$order[$i]['trf'] = 1;}
            else if (Storage::exists('trf/' . Auth::user()->id . '-order' . $order[$i]['id'] . '.svg'))     {$order[$i]['trf'] = 1;}
            else if (Storage::exists('trf/' . Auth::user()->id . '-order' . $order[$i]['id'] . '.webp'))    {$order[$i]['trf'] = 1;}
            $i++;
        }

        return view('user.orders', [
            'order' => $order,
        ]);
    }





    public function profile(Request $request)
    {
        // Ongkir
        $dekat  = 5000;
        $medium = 7500;
        $jauh   = 10000;
        $luar   = 20000;
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
        $medium = 7500;
        $jauh   = 10000;
        $luar   = 20000;
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
                $message = 'Stock produk ' . Coffee::where('id', $check->coffee_id)->first()->nama . ' kurang (tersisa ' . $check->stock . ' produk) ';
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





    public function cancelOrder($id)
    {
        $data = Order::where('id', $id)->first();

        if (strtolower($data->status) == "waiting") {
            if ($id) {
                if (Order::destroy($id)) {
                    if (OrderProduct::where('order_id', $id)->delete()) {
                        return back()->with('success', 'order canceled successfully');
                    } else {
                        return back()->with('fail', 'failed deleting order');
                    }
                } else {
                    return back()->with('fail', 'failed deleting order');
                }
            }
            return redirect()->route('myOrders');
        }

        return back()->with('fail', 'Order tidak bisa dicancel karena sudah diproses');
    }


    public function uploadtrf(Request $request)
    {
        $request->validate(['trf' => 'image',]);
        $user = User::find(Auth::user()->id);
        $order = Order::where('id', $request->id)->first();


        if ($request->hasFile('trf') && $request->file('trf')->isValid()) {
            // 1-order1.jpg
            $namafile = $user->id . '-order' . $order->id . '.' . $request->file('trf')->extension();
            $request->file('trf')->storeAs('trf', $namafile);

            $order->status = "waiting";
            $order->save();

            return back()->with('success', 'File uploaded Successfully');
        }
        return back()->with('fail', 'Error occured during file transfer upload, Please try again');
    }
}
