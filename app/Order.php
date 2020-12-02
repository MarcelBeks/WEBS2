<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use \App\OrderItem;

class Order extends Model
{
    protected $fillable = ['user_id', 'paid', 'total_price'];

    public function orderitems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public static function validateOrder($orderid)
    {
        if (($order = self::find($orderid)) == null)
            throw new \Exception('Invalide order!');
        if ($order->user_id != \Auth::user()->id)
            throw new \Exception('U heeft geen toegang tot deze order!');

        return $order;
    }
}
