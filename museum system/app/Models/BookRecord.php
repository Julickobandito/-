<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookRecord extends Model
{
    use HasFactory;

    protected $table = 'book_record'; 

    protected $primaryKey = "record_id"; 

    protected $guarded = [];

    public $timestamps = false;
}
