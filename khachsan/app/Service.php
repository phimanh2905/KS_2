<?php

namespace App;

use App\ServiceUsageList;
use App\TypeOfService;
use App\Unit;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $table = "dich_vus";
    protected $fillable = ['MaLoaiDichVu','MaDonVi','DonGia'];
    // protected $hidden = ['',''];

    public function danhSachSuDungDichVus() {
        return $this->hasMany(ServiceUsageList::class, 'MaDichVu');
    }
    public function loaiDichVu() {
        return $this->belongsTo(TypeOfService::class, 'MaLoaiDichVu');
    }
    public function donVi() {
        return $this->belongsTo(Unit::class, 'MaDonVi');
    }
}
