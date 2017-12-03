<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = "Services";
    protected $fillable = ['MaLoaiDichVu','MaDonVi','DonGia'];
    // protected $hidden = ['',''];
}
