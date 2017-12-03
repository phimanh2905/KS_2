<?php

namespace App;

use App\RoomType;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    //
    protected $table = "thiet_bis";

    protected $fillable = ['TenThietBi','MaLoaiPhong','SoLuong'];
    // protected $hidden = ['',''];

     public function loaiPhong() {
        return $this->belongsTo(RoomType::class, 'MaLoaiPhong');
    }
}
