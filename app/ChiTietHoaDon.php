<?php

namespace App;

use App\HoaDon;
use App\DanhSachSuDungDichVu;
use App\ChinhSachTraPhong;
use App\Phong;
use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDon extends Model
{
    protected $table = "ChiTietHoaDon";

    protected $fillable = [
        'MaHoaDon',
    	'MaPhong',
    	'MaSuDungDichVu',
    	'MaChinhSach',
    	'PhuThu', 
    	'TienPhong', 
    	'TienDichVu',
    	'GiamGiaKhachHang', 
    	'HinhThucThanhToan', 
    	'SoNgay', 
    	'ThanhTien', 
    ];
    public function hoaDon() {
        return $this->belongsTo(HoaDon::class, 'MaHoaDon');
    }
    public function danhSachSuDungDichVu () {
        return $this->belongsTo(DanhSachSuDungDichVu::class, 'MaSuDungDichVu');
    }
    public function chinhSachTraPhong() {
        return $this->belongsTo(ChinhSachTraPhong::class, 'MaChinhSach');
    }
    public function phong() {
        return $this->belongsTo(Phong::class, 'MaPhong');
    }
}
