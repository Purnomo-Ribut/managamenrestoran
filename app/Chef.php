<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    protected $table = 'tbl_chefs';

    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];
}
