<?php

namespace App;
use App\Sach;
use Illuminate\Database\Eloquent\Model;

class SachTheLoai extends Model
{
	protected $fillable = [
        'id_sach', 'id_theloai',
    ];
    protected $table = 'sach_theloai';
    public function getSachAttribute(){
    	$sach = Sach::find($this->id_sach);
    	return $sach;
    }
}
