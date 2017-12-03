<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Room;
use App\User;

class CheckInDetail extends Model
{
    //
    protected $table = "chi_tiet_phieu_nhan_phongs";
    protected $fillable = ['MaPhong','HoTenKhachHang','CMND','NgayNhan','NgayTraDuKien','NgayTraThucTe'];
    // protected $hidden = ['',''];
    public function phong()
    {
    	return $this->belongsTo(Room::class, 'MaPhong');
    }
    public function user()
    {
    	return $this->belongsTo(User::class, 'HoTenKhachHang');
    }
}
