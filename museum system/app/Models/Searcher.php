<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Searcher extends Model
{
    use HasFactory;

    protected $table = 'searcher';

    protected $primaryKey = "record_id"; 
}
