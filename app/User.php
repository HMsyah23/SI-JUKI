<?php

namespace App;

use App\Model\Guru;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'id_user';

    public $timestamps = false;
    protected $guarded = [];

    public function guru()
    {
        return $this->hasOne(Guru::class,'id_user');
    }
}
