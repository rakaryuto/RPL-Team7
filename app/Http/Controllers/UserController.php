<?php

namespace App\Http\Controllers;

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
        return view('user.orders');
    }





    public function checkout(Request $request)
    {
        return 'ok';
    }





    public function profile(Request $request)
    {
        if ($request->jabodetabek == "dalam") {
            $alamat = "Jabodetabek";
        } else if ($request->jabodetabek == "luar") {
            $alamat = "";
        }
        $alamat = $alamat . " " . ucwords($request->kota);
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

        $alamat = ucwords(Auth::user()->name) . " " . $alamat;
        $user = User::find(Auth::user()->id);

        $user->whatsapp = $request->whatsapp;
        $user->alamat = $alamat;
        $user->save();

        return back()->with('success', 'Profil berhasil diupdate');
    }
}
