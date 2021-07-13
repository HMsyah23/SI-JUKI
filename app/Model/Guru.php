<?php

namespace App\Model;

use App\User;
use App\Model\MapelGuru;
use App\Model\Jabatan;
use App\Model\StatusKepegawaian;
use App\Model\Agenda;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $primaryKey = 'id_guru';

    public $timestamps = false;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class,'id_user');
    }

    public function jabatan(){
        return $this->belongsTo(Jabatan::class,'id_jabatan');
    }

    public function status(){
        return $this->belongsTo(StatusKepegawaian::class,'id_kepegawaian');
    }

    public function mapel()
    {
        return $this->hasOne(MapelGuru::class,'id_guru');
    }

    public function agenda()
    {
        return $this->hasOne(Agenda::class,'id_guru');
    }
}
