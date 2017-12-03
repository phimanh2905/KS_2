<?php

namespace App;

use App\PhieuThuePhong;
use App\Room;
use Illuminate\Database\Eloquent\Model;

class RoomReservationDetail extends Model
{
    //
    protected $table = "chi_tiet_phieu_thue_phongs";
    protected $fillable = ['MaPhong','MaKhachHang','NgayDangKy','NgayNhan'];
    // protected $hidden = ['',''];
    public function phieuThuePhong() {
        return $this->belongsTo(PhieuThuePhong::class, 'MaPhieuThue');
    }
    public function phong() {
        return $this->belongsTo(Room::class, 'MaPhong');
    }
}
