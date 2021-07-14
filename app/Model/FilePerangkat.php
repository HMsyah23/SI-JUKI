<?php

namespace App\Model;

use App\Model\MapelGuru;
use App\Model\FilePerangkat;
use Illuminate\Database\Eloquent\Model;

class FilePerangkat extends Model
{
    protected $primaryKey = 'id_file';

    protected $guarded = [];

    public function mapelGuru(){
        return $this->belongsTo(MapelGuru::class,'id_mapel_guru');
    }

}
