<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Guru;

class Jabatan extends Model
{
    protected $primaryKey = 'id_jabatan';

    public $timestamps = false;
    protected $guarded = [];

    public function guru()
    {
        return $this->hasOne(Guru::class,'id_jabatan');
    }
}
