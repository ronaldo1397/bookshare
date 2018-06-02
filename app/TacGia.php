<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TacGia extends Model
{
	protected $fillable = [
        'butdanh', 'mota',
    ];
    protected $table = 'tacgia';

    public static function get($name) {
    	$tg = TacGia::where('butdanh', $name)->first();
    	return $tg;
    }
    public static function insert($name, $mota = '') {
    	$all = TacGia::all();
    	$tg = null;
    	foreach ($all as $key => $value) {
    		if(strtolower($value->butdanh) == strtolower($name)) {
    			$tg = $value;
    			break;
    		}
    	}
    	if(!$tg) {
    		$tg = TacGia::create([
    			'butdanh' => $name,
    			'mota'	=> $mota,
    		]);
    		return $tg;
    	} else {
    		$tg->updated_at = date('Y-m-d H:i:s',time());
    		$tg->save();
    		return $tg;
    	}
    }
}
