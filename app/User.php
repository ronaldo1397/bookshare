<?php

namespace App;

use App\TuSach;
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
    public function sosach() {
        $count = 0;
        $sach = TuSach::where('id_user', $this->id)->get();
        foreach ($sach as $key => $value) {
           $count += $value->soluong;
        }
        return $count;
    }
}
