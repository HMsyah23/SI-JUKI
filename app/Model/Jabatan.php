<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $primaryKey = 'id_jabatan';

    public $timestamps = false;
    protected $guarded = [];
}
