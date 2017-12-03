<?php

namespace App;

use App\ChiTietHoaDon;
use Illuminate\Database\Eloquent\Model;

class ChinhSachTraPhong extends Model
{
    protected $table = "ChinhSachTraPhong";

    protected $fillable = [
    	'ThoiGianQuiDinh',
    	'PhuThu',
    ];
    public function chiTietHoaDons () {
        return $this->hasMany(ChiTietHoaDon::class, 'MaChinhSach');
    }
}
