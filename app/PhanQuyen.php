<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhanQuyen extends Model
{
	protected $fillable = [
        'id_quyen', 'id_user'
    ];
    protected $table = 'phanquyen';
}
