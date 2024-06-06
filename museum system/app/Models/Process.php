<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    use HasFactory;

    protected $table = 'process';

    protected $primaryKey = "process_id"; 

    protected $fillable = [];

    public $timestamps = false;
}
