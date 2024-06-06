<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjectMovement extends Model
{
    use HasFactory;

    protected $table = 'object_movement';

    protected $primaryKey = "object_id"; 

    protected $guarded = [];

    public $timestamps = false;
}
