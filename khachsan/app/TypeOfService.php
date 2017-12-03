<?php

namespace App;

use App\Service;
use Illuminate\Database\Eloquent\Model;

class TypeOfService extends Model
{
    //
    protected $table = "loai_dich_vus";
    
    protected $fillable = ['TenLoaiDichVu'];
    // protected $hidden = ['',''];

    public function dichVus() {
        return $this->hasMany(Service::class, 'MaLoaiDichVu');
    }
}
