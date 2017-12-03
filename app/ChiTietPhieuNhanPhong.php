<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietPhieuNhanPhong extends Model
{
    protected $table = "ChiTietPhieuNhanPhong";

    protected $fillable = [
    	'MaNhanPhong', 
    	'MaPhong', 
    	'HoTenKhachHang', 
    	'CMND', 
    	'NgayNhan',
    	'NgayTraDuKien', 
    	'NgayTraThucTe', 
    ];
}
