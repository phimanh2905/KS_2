<?php

namespace App;

use App\PhieuThuePhong;
use App\ChiTietPhieuThuePhong;
use App\KhachHang;
use Illuminate\Database\Eloquent\Model;

class PhieuThuePhong extends Model
{
    protected $table = "PhieuThuePhong";

    protected $fillable = [
    	'MaKhachHang', 
    ];
    public function phieuNhanPhongs() {
        return $this->hasMany(PhieNhanPhong::class, 'MaPhieuThue');
    }
    public function chiTietPhieuThuePhongs() {
        return $this->hasMany(ChiTietPhieuThuePhong::class, 'MaPhieuThue');
    }
    public function khachHang() {
        return $this->belongsTo(KhachHang::class, 'MaKhachHang');
    }
}
