<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TuSach extends Model
{
	protected $fillable = [
        'id_user', 'id_sach', 'soluong', 'hinhthuc',
    ];
    protected $table = 'tusach';
}
