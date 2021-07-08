<?php

namespace App\Model;

use App\Model\Agenda;
use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    protected $primaryKey = 'id_tahun_ajaran';

    public $timestamps = false;
    protected $guarded = [];

    public function agenda()
    {
        return $this->hasOne(Agenda::class,'id_tahun_ajaran');
    }
}
