<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YeuCau extends Model
{
	protected $fillable = [
        'id_user_send', 'id_user_receive', 'id_sach', 'hinhthuc', 'loinhan', 'ngaymuon', 'ngaytra', 'tinhtrang',
    ];
    protected $table = 'yeucau';
}
