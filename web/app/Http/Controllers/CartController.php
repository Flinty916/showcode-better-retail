<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cart\AddItemCartRequest;
use App\Models\NodeItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function all()
    {
        return response(Session::get('cart'));
    }

    public function addItem(AddItemCartRequest $request) {
        $item = NodeItem::findOrFail($request->all());
        $cart = Session::get('cart');
        $cart[$item->id] = $item;
        Session::push('cart', $cart);
        return response(Session::get('cart'));
    }

    public function removeItem(AddItemCartRequest $request) {
        $item = NodeItem::findOrFail($request->all());
        $cart = Session::get('cart');
        unset($cart[$item->id]);
        Session::push('cart', $cart);
        return response(Session::get('cart'));
    }
}
