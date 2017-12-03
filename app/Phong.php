<?php

namespace App;

use App\ChiTietPhieuThuePhong;
use App\ChiTietHoaDon;
use App\LoaiTinhTrang;
use App\LoaiPhong;
use Illuminate\Database\Eloquent\Model;

class Phong extends Model
{
    protected $table = "Phong";

    protected $fillable = [
    	'MaLoaiPhong',
    	'MaLoaiTinhTrangPhong',
    	'GhiChu', 
    ];
    public function chiTietPhieuThuePhongs() {
        return $this->hasMany(ChiTietPhieuThuePhong::class, 'MaPhong');
    }
    public function chiTietHoaDons() {
        return $this->hasMany(ChiTietHoaDon::class, 'MaPhong');
    }
    public function loaiTinhTrang() {
        return $this->belongsTo(LoaiTinhTrang::class, 'MaLoaiTinhTrangPhong');
    }
    public function loaiPhong() {
        return $this->belongsTo(LoaiPhong::class, 'MaLoaiPhong');
    }
}
