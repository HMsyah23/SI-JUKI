<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    protected $primaryKey = 'id_tahun_ajaran';

    public $timestamps = false;
    protected $guarded = [];
}
