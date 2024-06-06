<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Museum extends Model
{
    use HasFactory;

    protected $table = 'museum';

    protected $primaryKey = "museum_id"; 

    protected $fillable = ['museum_code','museum_name','museum_type','museum_description','museum_address','museum_contacts'];

    public $timestamps = false;
}
