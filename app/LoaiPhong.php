<?php

namespace App;

use App\Phong;
use App\ThietBi;
use Illuminate\Database\Eloquent\Model;

class LoaiPhong extends Model
{
    protected $table = "LoaiPhong";

    protected $fillable = [
    	'TenLoaiPhong',
    	'DonGia',
    	'SoLuongNguoiChuan', 
    	'SoLuongNguoiToiDa', 
    	'TiLeTang',
    ];
    public function phongs() {
        return $this->hasMany(Phong::class, 'MaLoaiPhong');
    }
    public function thietBis() {
        return $this->hasMany(ThietBi::class, 'MaLoaiPhong');
    }
}
