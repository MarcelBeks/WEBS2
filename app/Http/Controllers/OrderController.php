<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Product;
use \App\Cart;
use \App\Order;
use \App\OrderItem;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Order::where(['user_id' => \Auth::user()->id])->get();

        return view('order.index', compact('orders'));
    }

    public function view($orderid)
    {
        $order = Order::validateOrder($orderid);

        return view('order.view', compact('order'));
    }

    public function create($redirectToPay = false) 
    {
        if (($cart = Cart::getItems()) != null)
        {
            $cart = new Cart($cart);
            $order = Order::create([
                'user_id' => \Auth::user()->id,
                'total_price' => $cart->totalPrice
            ]);

            foreach ($cart->items as $id => $item) 
            {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $id,
                    'amount' => $item['qty'],
                    'price' => $item['qty'] * $item['item']['price']
                ]);
            }

            Cart::clear();

            if ($redirectToPay)
                return redirect()->route('pay.methods', ['order_id' => $order->id]);
        }

        return redirect()->route('home')
            ->with('error', 'Uw winkelwagen is leeg!');
    }
}
