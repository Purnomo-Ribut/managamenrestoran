<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'tbl_orders';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function menu()
    {
        return $this->belongsTo('App\Menu');
    }

    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail');
    }
}
