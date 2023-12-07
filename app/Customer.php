<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'tbl_customers';
    public function order()
    {
        return $this->hasOne('App\Order');
    }
}
