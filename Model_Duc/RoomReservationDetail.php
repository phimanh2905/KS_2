<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = " RoomReservationDetails";
    protected $fillable = ['MaPhong','NgayDangKy','NgayNhan'];
    // protected $hidden = ['',''];
}
