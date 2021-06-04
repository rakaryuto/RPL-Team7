<?php

namespace App\Http\Controllers;
use App\Models\Coffee;
use App\Models\Pack;
use App\Models\Product;
use App\Models\Size;

class AdminController extends Controller {

    public function index() {
        return view('admin.index');
    }

    public function indexlogin() {
        return view('admin.login');
    }

    public function login() {
        session_start();

        $password = $_POST["password"];
        
        if($password == "4dm1nk0p1k1m0") {
            $_SESSION["login"] = true;
            echo "<script type='text/javascript'>
            alert('Login Sukses!');
            window.location.replace('/admin')
            </script>";
            return redirect()->route('/admin');
        } else {
            echo "<script type='text/javascript'>
            alert('Passowrd salah.');
            window.location.replace('/admin/login')
            </script>";
        }
    }

    public function logout() {
        session_start();
        $_SESSION = [];
        session_unset();
        session_destroy();
        // return redirect()->route('/admin');
        return view('admin.index');
    }

    public function products() {
        $i = 1;
        return view('admin.products', [
            'products' => Product::all(),
            'coffees' => Coffee::all(),
            'packs' => Pack::all(),
            'sizes' => Size::all(),
        ]);
    }
    
    public function orders() {
        return view('admin.orders', [
            'products' => Product::all(),
            'coffees' => Coffee::all(),
            'packs' => Pack::all(),
            'sizes' => Size::all(), 
        ]);
    }

}

?>
