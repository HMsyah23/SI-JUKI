<?php

namespace App\Model;

use App\Model\Agenda;
use App\Model\Guru;
use App\Model\Kela;
use App\Model\MataPelajaran;
use Illuminate\Database\Eloquent\Model;

class MapelGuru extends Model
{
    protected $primaryKey = 'id_mapel_guru';

    public $timestamps = false;
    protected $guarded = [];

    public function guru(){
        return $this->belongsTo(Guru::class,'id_guru');
    }

    public function mapel(){
        return $this->belongsTo(MataPelajaran::class,'id_mapel');
    }

    public function kelas(){
        return $this->belongsTo(Kela::class,'id_kelas');
    }

    public function agenda()
    {
        return $this->hasOne(Agenda::class,'id_mapel_guru');
    }
}
