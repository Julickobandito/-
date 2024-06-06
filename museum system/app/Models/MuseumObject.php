<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MuseumObject extends Model
{
    use HasFactory;

    protected $table = 'museum_object'; 

    protected $primaryKey = "obj_id"; 

    protected $guarded = [];
    //protected $fillable = [];

    public $timestamps = false;
}
