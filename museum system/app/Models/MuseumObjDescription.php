<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MuseumObjDescription extends Model
{
    use HasFactory;

    protected $table = 'museum_obj_description';

    protected $primaryKey = "descr_id"; 

    protected $guarded = [];

    public $timestamps = false;
}
