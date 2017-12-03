<?php

namespace App;

use App\DanhSachSuDungDichVu;
use App\DichVu;
use App\DonVi;
use Illuminate\Database\Eloquent\Model;

class DichVu extends Model
{
    protected $table = "DichVu";

    protected $fillable = [
    	'MaLoaiDichVu',
    	'MaDonVi',
    	'DonGia', 
    ];
    public function danhSachSuDungDichVus() {
        return $this->hasMany(DanhSachSuDungDichVu::class, 'MaDichVu');
    }
    public function loaiDichVu() {
        return $this->belongsTo(DichVu::class, 'MaLoaiDichVu');
    }
    public function donVi() {
        return $this->belongsTo(DonVi::class, 'MaDonVi');
    }
}
