<?php

namespace App;

use App\Bill;
use App\PhieuThuePhong;
use App\CheckIn;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
   protected $table = "khach_hangs";
   
   protected $fillable = ['TenKhachHang','CMND','GioiTinh','DiaChi','DienThoai','QuocTich'];

   public function hoaDons() {
        return $this->hasMany(Bill::class, 'MaKhachHang');
    }
    public function phieuThuePhongs() {
        return $this->hasMany(PhieuThuePhong::class, 'MaKhachHang');
    }
    public function phieuNhanPhongs() {
        return $this->hasMany(CheckIn::class, 'MaKhachHang');
    }
}
