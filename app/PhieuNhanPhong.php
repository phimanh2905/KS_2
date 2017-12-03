<?php

namespace App;

use App\PhieuThuePhong;
use App\DanhSachSuDungDichVu;
use App\KhachHang;
use App\HoaDon;
use Illuminate\Database\Eloquent\Model;

class PhieuNhanPhong extends Model
{
    protected $table = "PhieuNhanPhong";

    protected $fillable = [
    	'MaPhieuThue', 
    	'MaKhachHang', 	
    ];

    public function phieuThuePhong() {
        return $this->belongsTo(PhieuThuePhong::class, 'MaPhieuThue');
    }
    public function danhSachSuDungDichVus() {
        return $this->hasMany(DanhSachSuDungDichVu::class, 'MaNhanPhong');
    }
    public function khachHang() {
        return $this->belongsTo(KhachHang::class, 'MaKhachHang');
    }
    public function hoaDon() {
        return $this->hasMany(HoaDon::class, 'MaNhanPhong');
    }
}
