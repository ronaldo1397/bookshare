<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SachTheLoai extends Model
{
	protected $fillable = [
        'id_sach', 'id_theloai',
    ];
    protected $table = 'sach_theloai';
}
