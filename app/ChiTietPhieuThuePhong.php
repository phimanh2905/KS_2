<?php

namespace App;

use App\PhieuThuePhong;
use App\Phong;
use Illuminate\Database\Eloquent\Model;

class ChiTietPhieuThuePhong extends Model
{
    protected $table = "DichVu";

    protected $fillable = [
    	'MaPhieuThue',
    	'MaPhong',
    	'NgayDangKi', 
    	'NgayNhan'
    ];
    public function phieuThuePhong() {
        return $this->belongsTo(PhieuThuePhong::class, 'MaPhieuThue');
    }
    public function phong() {
        return $this->belongsTo(Phong::class, 'MaPhong');
    }
}
