<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'tbl_carts';

    public function menu()
    {
        return $this->belongsTo('App\Menu');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
