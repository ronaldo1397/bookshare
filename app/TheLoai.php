<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
	protected $fillable = [
        'tenloai', 'mota',
    ];
    protected $table = 'theloai';
}
