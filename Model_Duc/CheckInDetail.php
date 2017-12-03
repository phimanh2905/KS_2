<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = "CheckInDetails";
    protected $fillable = ['MaPhong','HoTenKhachHang','CMND','NgayNhan','NgayTraDuKien','NgayTraThucTe'];
    // protected $hidden = ['',''];
}
