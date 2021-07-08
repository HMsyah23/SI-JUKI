<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    protected $primaryKey = 'id_mapel';

    public $timestamps = false;
    protected $guarded = [];
}
