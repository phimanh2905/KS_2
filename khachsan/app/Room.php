<?php

namespace App;

use App\RoomReservationDetail;
use App\BillDetail;
use App\StatusRoomType;
use App\RoomType;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $table = "phongs";

    protected $fillable = ['TenPhong','MaLoaiPhong','MaLoaiTinhTrangPhong','GhiChu'];
    // protected $hidden = ['',''];
    
    public function chiTietPhieuThuePhongs() {
        return $this->hasMany(RoomReservationDetail::class, 'MaPhong');
    }
    public function chiTietHoaDons() {
        return $this->hasMany(BillDetail::class, 'MaPhong');
    }
    public function loaiTinhTrang() {
        return $this->belongsTo(StatusRoomType::class, 'MaLoaiTinhTrangPhong');
    }
    public function loaiPhong() {
        return $this->belongsTo(RoomType::class, 'MaLoaiPhong');
    }
}
