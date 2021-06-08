<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Pack;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function indexlogin()
    {
        return view('admin.login');
    }

    public function indexProducts()
    {
        return view('admin.products', [
            'products' => Product::all(),
            'coffees' => Coffee::all(),
            'packs' => Pack::all(),
            'sizes' => Size::all(),
        ]);
    }

    public function indexEditProd($id)
    {
        $item       = Product::find($id);
        if ($item) {
            $nama       = Coffee::where('id', Product::where('id', $id)->first()->coffee_id)->first()->nama;
            if ($item->extrashot) {
                $nama = $nama . ' with Extra Shot';
            }
            $pack    = Pack::where('id', Product::where('id', $id)->first()->pack_id)->first()->nama;
            $size     = Size::where('id', Product::where('id', $id)->first()->size_id)->first()->nama;

            return view('admin.editprod', [
                'item' => $item,
                'nama' => $nama,
                'pack' => $pack,
                'size' => $size,
            ]);
        }
        return redirect('/admin/products')->with('fail', 'Produk tidak ditemukan');
    }

    public function indexOrders()
    {
        return view('admin.orders', [
            'orders' => Order::all(),
        ]);
    }

    public function indexEditOrder($id)
    {
        $order = Order::find($id);
        if ($order) {

            $orderproducts = array();
            $i = 0;
            foreach (OrderProduct::where('order_id', $order->id)->get() as $item_prod) {
                $orderproducts[$i]['nama'] = Coffee::where('id', Product::Where('id', $item_prod['product_id'])->first()->coffee_id)->first()->nama;
                if ($item_prod->extrashot) {
                    $orderproducts[$i]['nama'] = $orderproducts[$i]['nama'] . ' with Extra Shot';
                }
                $orderproducts[$i]['pack'] = Pack::Where('id', Product::Where('id', $item_prod['product_id'])->first()->pack_id)->first()->nama;
                $orderproducts[$i]['size'] = Size::Where('id', Product::Where('id', $item_prod['product_id'])->first()->size_id)->first()->nama;
                $orderproducts[$i]['qty'] = $item_prod->jumlah;
                $orderproducts[$i]['harga'] = Product::Where('id', $item_prod['product_id'])->first()->harga * $item_prod->jumlah;
                $i++;
            }

            return view('admin.editorder', [
                'order' => $order,
                'orderproducts' => $orderproducts,
            ]);
        }
        return redirect('/admin/orders')->with('fail', 'Order tidak ditemukan');
    }






    public function login()
    {
        session_start();

        $password = $_POST["password"];

        if ($password == "4dm1nk0p1k1m0") {
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






    public function logout()
    {
        session_start();
        $_SESSION = [];
        session_unset();
        session_destroy();
        return redirect('/admin');
    }











    public function editProduct(Request $request)
    {
        $prod = Product::find($request->id);
        if ($prod) {
            $prod->stock = $request->stock;
            $prod->harga = $request->harga;
            $prod->save();

            return redirect('/admin/products')->with('success', 'Produk berhasil diedit');
        }
        return redirect('/admin/products')->with('fail', 'Produk gagal diedit');
    }











    public function editOrder(Request $request)
    {
        $order = Order::find($request->id);
        if ($order) {
            $order->status = $request->current;
            $order->save();

            return redirect('/admin/orders')->with('success', 'Order berhasil diedit');
        }
        return redirect('/admin/products')->with('fail', 'Order gagal diedit');
    }











    public function getPic($id)
    {
        if (Storage::exists('trf/' . $id . '.jpg')) {
            return Storage::disk('local')->download('trf/' . $id . '.jpg');
        }
    }
}
