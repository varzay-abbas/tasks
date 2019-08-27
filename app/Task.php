<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = [
        'user_id','parent_id','title', 'point','is_done', 'created_at', 'updated_at' 
    ];
}
