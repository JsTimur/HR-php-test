<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function orderFullPrice() {
        return $this->orderproducts->sum(function ($prod) {
            return $prod->quantity * $prod->price;
        });
    }
    public function partner(){
        return $this->belongsTo(Partner::class);
    }
    public function orderproducts() {
        return $this->hasMany(OrderProduct::class);
    }
    public function withEager() {
        return $this::with('partner', 'orderproducts');
    }

    protected $guarded = [];
}
