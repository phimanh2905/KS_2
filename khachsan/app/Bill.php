<?php

namespace App;

use App\CheckIn;
use App\Customer;
use App\CheckInDetail;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //
    protected $table = "hoa_dons";
    protected $fillable = ['NhanVienLap','MaKhachHang','MaPhong','TongTien','NgayLap'];
    // protected $hidden = ['',''];

    public function phieuNhanPhong() {
        return $this->belongsTo(CheckIn::class, 'MaPhong');
    }
    public function khachHang() {
        return $this->belongsTo(Customer::class, 'MaKhachHang');
    }
    public function chiTietHoaDons() {
        return $this->hasMany(CheckInDetail::class, 'MaHoaDon');
    }
}
