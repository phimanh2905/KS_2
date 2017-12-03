<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = "Bills";
    protected $fillable = ['NhanVienLap','MaKhachHang','MaNhanPhong','TongTien','NgayLap'];
    // protected $hidden = ['',''];
}
