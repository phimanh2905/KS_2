<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = "TypeOfServices";
    protected $fillable = ['TenLoaiDichVu'];
    // protected $hidden = ['',''];
}
