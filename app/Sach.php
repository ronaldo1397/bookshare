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
    public function getlistsohuuAttribute() {
    	$tusach = TuSach::where('id_sach', $this->id)->get();
    	return $tusach;
    }
    public function getimgAttribute() {
    	$sach_img = '/images/sach/no.jpg';
	    if($this->hinhanh != '' || $this->hinhanh != null ) {
	    	$sach_img = $this->hinhanh;
	    }
	    return $sach_img;
    }
    public function getlinkAttribute(){
        return '<a href="'.route('sach', $this->id).'" title="'.$this->tensach.'">'.$this->tensach.'</a>';
    }
}
