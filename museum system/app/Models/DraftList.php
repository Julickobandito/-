<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DraftList extends Model
{
    use HasFactory;

    protected $table = 'draft_list';

    protected $primaryKey = "obj_id"; 

    protected $guarded = [];

    public $timestamps = false;
}
