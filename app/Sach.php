<?php

namespace App;

use App\TuSach;
use Illuminate\Database\Eloquent\Model;

class Sach extends Model
{
	protected $fillable = [
        'tensach', 'hinhanh', 'id_tacgia', 'nhaxuatban', 'mota', 'id_user', 'giabia', 'tinhtrang'
    ];
    protected $table = 'sach';
    public function getsoluongAttribute() {
    	$tusach = TuSach::where('id_sach', $this->id)->get();
    	$count = 0;
    	foreach ($tusach as $key => $sach) {
    		$count += $sach->soluong;
    	}
    	return $count;
    }
    public function getsohuuAttribute() {
    	$tusach = TuSach::where('id_sach', $this->id)->get();
    	return count($tusach);
    }
}
