<?php

namespace App;

use App\BillDetail;
use Illuminate\Database\Eloquent\Model;

class CheckOutPolicy extends Model
{
    //
    protected $table = "chinh_sach_tra_phongs";
    protected $fillable = ['ThoiGianQuiDinh','PhuThu'];
    // protected $hidden = ['',''];
    public function chiTietHoaDons () {
        return $this->hasMany(BillDetail::class, 'MaChinhSach');
    }
}
