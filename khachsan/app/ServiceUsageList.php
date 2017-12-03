<?php

namespace App;

use App\CheckIn;
use App\BillDetail;
use App\Service;
use Illuminate\Database\Eloquent\Model;

class ServiceUsageList extends Model
{
    //
    protected $table = "danh_sach_su_dung_dich_vus";
    protected $fillable = ['MaDichVu','MaNhanPhong','SoLuong'];
    // protected $hidden = ['',''];

    public function phieuNhanPhong() {
        return $this->belongsTo(CheckIn::class, 'MaNhanPhong');
    }
    public function chiTietHoaDons() {
        return $this->hasMany(BillDetail::class, 'MaSuDungDichVu');
    }
    public function dichVu() {
        return $this->belongsTo(Service::class, 'MaDichVu');
    }
}
