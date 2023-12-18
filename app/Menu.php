<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'tbl_menuses';

    protected $fillable = [
        'id_kategori',
        'nama',
        'harga',
        'image',
        'deskripsi'
    ];

    public function Kategori() {
        return $this->belongsTo(Kategori::class,'id_kategori');
    }

    public function order()
    {
        return $this->hasOne('App\Order');
    }

    public function orderDetail()
    {
        return $this->hasMany('App\OrderDetail');
    }
}
