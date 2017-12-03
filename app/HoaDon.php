<?php

namespace App;

use App\PhieuNhanPhong;
use App\KhachHang;
use App\ChiTietHoaDon;
use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    protected $table = "HoaDon";

    protected $fillable = [
    	'NhanVienLap',
    	'MaKhachHang',
    	'MaNhanPhong', 
    	'TongTien',
    	'NgayLap',
    ];
    public function phieuNhanPhong() {
        return $this->belongsTo(PhieuNhanPhong::class, 'MaNhanPhong');
    }
    public function khachHang() {
        return $this->belongsTo(KhachHang::class, 'MaKhachHang');
    }
    public function chiTietHoaDons() {
        return $this->hasMany(ChiTietHoaDon::class, 'MaHoaDon');
    }
}
