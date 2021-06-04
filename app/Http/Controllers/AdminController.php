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
        return redirect('/admin');
    }

    public function indexProducts() {
        return view('admin.products', [
            'products' => Product::all(),
            'coffees' => Coffee::all(),
            'packs' => Pack::all(),
            'sizes' => Size::all(),
        ]);
    }

    public function indexEdit($id) {

        return view('admin.edit', [
            'products' => Product::where('id', $id)->get(),
            'coffees' => Coffee::all(),
        ]);
        
    }

    public function edit($id) {

        $prod = Product::where('id', $id)->get();

        foreach($prod as $item):

        Coffee::where('id', $item->coffee_id)->update([
            'nama' => $_POST['name'],
            'deskripsi' => $_POST['desc']
            ]);

        Product::where('id', $item->id)->update([
            'stock' => $_POST['stocks'],
            'harga' => $_POST['price']
        ]);
        endforeach;

        return redirect('/admin/products');
    }
}

?>
