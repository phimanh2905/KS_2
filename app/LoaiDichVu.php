<?php

namespace App;

use App\LoaiDichVu;
use Illuminate\Database\Eloquent\Model;

class LoaiDichVu extends Model
{
    protected $table = "LoaiDichVu";

    protected $fillable = [
    	'TenLoaiDichVu', 
    ];
    public function dichVus() {
        return $this->hasMany(LoaiDichVu::class, 'MaLoaiDichVu');
    }
}
