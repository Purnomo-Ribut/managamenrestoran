<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'tbl_carts';

    protected $fillable = [
        'customer_id', 'menu_id', 'qty', 'price',
    ];

    public function menu()
    {
        return $this->belongsTo('App\Menu');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
