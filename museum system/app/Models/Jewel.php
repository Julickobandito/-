<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jewel extends Model
{
    use HasFactory;

    protected $table = 'jewel';

    protected $primaryKey = "jewel_id"; 

    protected $guarded = [];

    public $timestamps = false;
}
