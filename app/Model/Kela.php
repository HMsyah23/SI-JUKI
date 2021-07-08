<?php

namespace App\Model;

use App\Model\MapelGuru;
use Illuminate\Database\Eloquent\Model;

class Kela extends Model
{
    protected $primaryKey = 'id_kelas';

    public $timestamps = false;
    protected $guarded = [];

    public function mapel()
    {
        return $this->hasOne(MapelGuru::class,'id_kelas');
    }
}
