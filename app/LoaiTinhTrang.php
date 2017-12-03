<?php

namespace App;

use App\Phong;
use Illuminate\Database\Eloquent\Model;

class LoaiTinhTrang extends Model
{
    protected $table = "LoaiTinhTrang";

    protected $fillable = [
    	'TenLoaiTinhTrangPhong',
    ];
    public function phongs() {
        return $this->hasMany(Phong::class, 'MaLoaiTinhTrangPhong');
    }
}
