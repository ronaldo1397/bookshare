<?php

namespace App;

use App\TuSach;
use App\Sach;
use App\Quyen;
use App\PhanQuyen;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function getsosachAttribute() {
        $count = 0;
        $tusach = TuSach::where('id_user', $this->id)->get();
        foreach ($tusach as $key => $value) {
            $sach = Sach::find($value->id_sach);
            if($sach->tinhtrang > 0)
                $count += $value->soluong;
        }
        return $count;
    }
    public function sohuu($idsach) {
        $tusach = TuSach::where('id_sach', $idsach)->where('id_user', $this->id)->first();
        if($tusach) return $tusach->soluong;
        return 0;
    }
    public function getlinkAttribute(){
        return '<a href="'.route('user', $this->username).'">'.$this->hoten.'</a>';
    }
    public function getlinkfullAttribute(){
        return $this->hoten.' (<a href="'.route('user', $this->username).'">@'.$this->username.'</a>)';
    }
    public function getlinkavatarAttribute(){
        $icon = '/images/icon/icon-user-you.png';
        if($this->anhdaidien != '' || $this->anhdaidien != null ) {
            $icon = $this->anhdaidien;
        }
        return $icon;
    }
    public function getisAdminAttribute(){
        $phanquyen = PhanQuyen::where('id_user', $this->id)->first();
        if($phanquyen) return $phanquyen;
        else return null;
    }
}
