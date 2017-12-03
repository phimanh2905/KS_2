<?php

namespace App;

use App\Room;
use App\Roommap;
use Illuminate\Database\Eloquent\Model;

class RoomReservationDetail extends Model
{
    //
    protected $table = "chi_tiet_phieu_thue_phongs";
    protected $fillable = ['MaPhong','MaKhachHang','NgayDangKy','NgayNhan'];
    // protected $hidden = ['',''];
    public function phong() {
        return $this->belongsTo(Room::class, 'MaPhong');
    }
    public function roommap() {
        return $this->belongsTo(Roommap::class, 'MaPhong');
    }
}
