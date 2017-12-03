<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = "Users";
    protected $fillable = ['TenDangNhap','MatKhau','LoaiNguoiDung'];
    // protected $hidden = ['',''];
}
