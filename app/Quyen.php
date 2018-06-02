<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quyen extends Model
{
	protected $fillable = [
        'tenquyen', 'mota'
    ];
    protected $table = 'quyen';
}
