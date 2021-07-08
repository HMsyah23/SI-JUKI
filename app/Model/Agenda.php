<?php

namespace App\Model;

use App\Model\Guru;
use App\Model\MataGuru;
use App\Model\TahunAjaran;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $primaryKey = 'id_agenda';

    protected $guarded = [];

    public function guru(){
        return $this->belongsTo(Guru::class,'id_guru');
    }

    public function tahunAjaran(){
        return $this->belongsTo(TahunAjaran::class,'id_tahun_ajaran');
    }

    public function mapelGuru(){
        return $this->belongsTo(MapelGuru::class,'id_mapel_guru');
    }
}
