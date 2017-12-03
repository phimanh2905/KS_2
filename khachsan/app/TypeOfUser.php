<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeOfUser extends Model
{
    //
    protected $table = "loai_nguoi_dungs";
    protected $fillable = ['TenLoaiNguoiDung'];
    // protected $hidden = ['',''];
}
