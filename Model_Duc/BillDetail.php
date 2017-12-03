<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = "BillDetails";
    protected $fillable = ['MaPhong','MaSuDungDichVu','MaChinhSach','PhuThu','TienPhong','TienDichVu','GiamGiaKH','HinhThucThanhToan','SoNgay','ThanhTien'];
    // protected $hidden = ['',''];
}
