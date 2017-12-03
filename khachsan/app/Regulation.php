<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regulation extends Model
{
    //
    protected $table = "quy_dinhs";
    protected $fillable = ['TenQuiDinh','MoTa'];
    // protected $hidden = ['',''];
}
