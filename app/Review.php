<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
	protected $fillable = [
        'id_sach', 'id_user', 'noidung'
    ];
    protected $table = 'review';
}
