<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = "Regulations";
    protected $fillable = ['TenQuiDinh','MoTa'];
    // protected $hidden = ['',''];
}
