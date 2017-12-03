<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = "Devices";
    protected $fillable = ['TenThietBi','MaLoaiPhong','SoLuong'];
    // protected $hidden = ['',''];
}
