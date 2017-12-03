<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckInDetail extends Model
{
    //
    protected $table = "chi_tiet_phieu_nhan_phongs";
    protected $fillable = ['MaPhong','HoTenKhachHang','CMND','NgayNhan','NgayTraDuKien','NgayTraThucTe'];
    // protected $hidden = ['',''];
}
