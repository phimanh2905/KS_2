<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThamSo extends Model
{
    protected $table = "ThamSo";

    $fillable = [
    	'PhieuDangKy', 
    	'PhieuNhan', 
    	'HoaDon',
    	'STT',
    ];
}
