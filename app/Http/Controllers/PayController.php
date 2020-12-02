<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Product;
use \App\Order;

class PayController extends Controller
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

    public function methods(Request $request, $orderid)
    {
        if ($this->isAny($request))
        {
            $order = Order::validateOrder($orderid);
            if ($order->paid)
                return redirect()->route('home');
            return view('pay.methods', compact('orderid'));
        }

        return redirect()->route('login');
    }

    public function pay($orderid)
    {
        $order = Order::validateOrder($orderid);
        if ($order->paid)
            return redirect()->route('home');
        $order->paid = true;
        $order->save();
        return redirect()->route('home')->with('success', 'Geslaagd, de order wordt nu voor u klaar gezet!');
    }
}
