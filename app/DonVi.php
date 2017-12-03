<?php

namespace App;

use App\DichVu;
use Illuminate\Database\Eloquent\Model;

class DonVi extends Model
{
    protected $table = "DonVi";

    protected $fillable = [
    	'TenDonVi', 
    ];
    public function dichVus() {
        return $this->hasMany(DichVu::class, 'MaDonVi');
    }
}
