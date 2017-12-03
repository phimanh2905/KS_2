<?php

namespace App;

use App\PhieuNhanPhong;
use App\ChiTietHoaDon;
use App\DichVu;
use Illuminate\Database\Eloquent\Model;

class DanhSachSuDungDichVu extends Model
{
    protected $table = "DanhSachSuDungDichVu";

    protected $fillable = [
    	'MaDichVu',
    	'MaNhanPhong',
    	'SoLuong', 
    ];
    public function phieuNhanPhong() {
        return $this->belongsTo(PhieuNhanPhong::class, 'MaNhanPhong');
    }
    public function chiTietHoaDons() {
        return $this->hasMany(ChiTietHoaDon::class, 'MaSuDungDichVu');
    }
    public function dichVu() {
        return $this->belongsTo(DichVu::class, 'MaDichVu');
    }
}
