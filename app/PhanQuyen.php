<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Quyen;
class PhanQuyen extends Model
{
	protected $fillable = [
        'id_quyen', 'id_user'
    ];
    protected $table = 'phanquyen';
    public function getQuyenAttribute(){
    	$quyen = Quyen::find($this->id_quyen);
    	return $quyen;
    }
}
