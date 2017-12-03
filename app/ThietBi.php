<?php

namespace App;

use App\LoaiPhong;
use Illuminate\Database\Eloquent\Model;

class ThietBi extends Model
{
    protected $table = "ThietBi";

    protected $fillable = [
    	'TenThietBi',
    	'MaLoaiPhong',
    	'SoLuong', 
    ];
    public function loaiPhong() {
        return $this->belongsTo(LoaiPhong::class, 'MaLoaiPhong');
    }
}
