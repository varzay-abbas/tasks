<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = [
        'user_id','parent_id','title', 'points','is_done', 'created_at', 'updated_at'
    ];

    public function subtasks()
    {
        return $this->hasMany(Task::class, 'parent_id');
    }

    public function childrenSubtasks()
    {
        return $this->hasMany(Task::class, 'parent_id')->with('subtasks');
    }
}
