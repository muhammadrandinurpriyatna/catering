<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\Cart;
use App\Models\Order;

class CartController extends Controller
{
    public function cart()
    {
        $carts = Cart::with('menu')->where('user_id', Auth::user()->id)->get();

        $menuNames = $carts->pluck('menu.name')->implode(', ');

        $totalPrice = $carts->sum('price');
        $totalQty = $carts->sum('qty');

        return view('pages.cart', compact('carts', 'totalPrice', 'totalQty', 'menuNames'));
    }

    public function cartAction(Request $request, $menu_id)
    {
        $price = Menu::findOrFail($menu_id);

        $cart = new Cart;
        $cart->user_id = Auth::user()->id;
        $cart->menu_id = $menu_id;
        $cart->qty = $request->qty;
        $cart->price = $request->qty * $price->price;
        $cart->save();

        return redirect()->back()->with('success', 'success menambahkan ke cart, cek cart di dropdown profil');
    }

    public function order(Request $request)
    {
        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->name = $request->name;
        $order->qty = $request->qty;
        $order->price = $request->price;
        $order->date = $request->date;
        $order->save();

        Cart::where('user_id', Auth::user()->id)->delete();

        return redirect()->route('order')->with('success', 'sukses order');
    }
}
