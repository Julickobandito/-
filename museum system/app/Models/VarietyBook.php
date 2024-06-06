<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VarietyBook extends Model
{
    use HasFactory;

    protected $table = 'variety_book';

    protected $primaryKey = "varbook_id"; 

    protected $fillable = ['varbook_id','varbook_code','varbook_description'];

    public $timestamps = false;
}
