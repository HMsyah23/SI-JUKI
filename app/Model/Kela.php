<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kela extends Model
{
    protected $primaryKey = 'id_kelas';

    public $timestamps = false;
    protected $guarded = [];
}
