<?php

namespace App;

use App\RoomReservationDetail;
use App\ServiceUsageList;
use App\Customer;
use App\Bill;
use Illuminate\Database\Eloquent\Model;

class CheckIn extends Model
{
    //
    protected $table = "phieu_nhan_phongs";
    protected $fillable = ['MaPhieuThue','MaKhachHang'];
    // protected $hidden = ['',''];
    public function phieuThuePhong() {
        return $this->belongsTo(RoomReservationDetail::class, 'MaPhieuThue');
    }
    public function danhSachSuDungDichVus() {
        return $this->hasMany(ServiceUsageList::class, 'MaNhanPhong');
    }
    public function khachHang() {
        return $this->belongsTo(Customer::class, 'MaKhachHang');
    }
    public function hoaDon() {
        return $this->hasMany(Bill::class, 'MaNhanPhong');
    }
}
