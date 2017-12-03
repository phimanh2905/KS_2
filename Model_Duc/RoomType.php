<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = "RoomTypes";
    protected $fillable = ['TenLoaiPhong','DonGia','SoNguoiChuan','SoNguoiToiDa','TyLeTang'];
    // protected $hidden = ['',''];
}
