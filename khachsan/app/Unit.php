<?php

namespace App;

use App\Service;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    //
    protected $table = "don_vis";
    
    protected $fillable = ['TenDonVi'];
    // protected $hidden = ['',''];

    public function dichVus() {
        return $this->hasMany(Service::class, 'MaDonVi');
    }
}
