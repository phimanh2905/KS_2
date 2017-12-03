<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuyDinh extends Model
{
    protected $table = "QuiDinh";

    protected $fillable = [
    	'TenQuiDinh',
    	'MoTa',
    ];
}
