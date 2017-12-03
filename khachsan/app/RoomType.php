<?php

namespace App;

use App\Room;
use App\Device;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    //
    protected $table = "loai_phongs";
    protected $fillable = ['TenLoaiPhong','DonGia','SoNguoiChuan','SoNguoiToiDa','TyLeTang'];
    // protected $hidden = ['',''];
    public function phongs() {
        return $this->hasMany(Room::class, 'MaLoaiPhong');
    }
    public function thietBis() {
        return $this->hasMany(Device::class, 'MaLoaiPhong');
    }
}
