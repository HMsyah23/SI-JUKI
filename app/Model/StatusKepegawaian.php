<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Guru;

class StatusKepegawaian extends Model
{
    protected $primaryKey = 'id_status_kepegawaian';

    public $timestamps = false;
    protected $guarded = [];

    public function guru()
    {
        return $this->hasOne(Guru::class,'id_kepegawaian');
    }
}
