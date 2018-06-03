<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class TuSach extends Model
{
	protected $fillable = [
        'id_user', 'id_sach', 'soluong', 'hinhthuc',
    ];
    protected $table = 'tusach';
    public function getuserAttribute() {
    	return User::find($this->id_user);
    }
}
