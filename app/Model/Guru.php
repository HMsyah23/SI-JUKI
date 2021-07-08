<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $primaryKey = 'id_guru';

    public $timestamps = false;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class,'id_user');
    }
}
