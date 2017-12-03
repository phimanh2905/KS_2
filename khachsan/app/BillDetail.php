<?php

namespace App;

use App\Bill;
use App\ServiceUsageList;
use App\CheckOutPolicy;
use App\Room;
use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    //
    protected $table = "chi_tiet_hoa_dons";
    protected $fillable = ['MaPhong','MaSuDungDichVu','MaChinhSach','PhuThu','TienPhong','TienDichVu','GiamGiaKH','HinhThucThanhToan','SoNgay','ThanhTien'];
    // protected $hidden = ['',''];
    public function hoaDon() {
        return $this->belongsTo(Bill::class, 'MaHoaDon');
    }
    public function danhSachSuDungDichVu () {
        return $this->belongsTo(ServiceUsageList::class, 'MaSuDungDichVu');
    }
    public function chinhSachTraPhong() {
        return $this->belongsTo(CheckOutPolicy::class, 'MaChinhSach');
    }
    public function phong() {
        return $this->belongsTo(Room::class, 'MaPhong');
    }
}
