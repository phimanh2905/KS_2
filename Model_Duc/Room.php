<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = "Rooms";
    protected $fillable = ['MaLoaiPhong','MaLoaiTinhTrangPhong','GhiChu'];
    // protected $hidden = ['',''];
}
