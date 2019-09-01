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

    public function getIds()
    {
        $ids =  [$this->id];
        
        foreach ($this->subtasks as $child) {
            $ids = array_merge($ids, $child->getIds());
        }
        return $ids;
    }

    public function getDescendantIdsArray()
    {
        $ids =  $this->getIds();
        $ids_array = [];

        foreach ($ids as $id) {
            //remove self id and keeping only descendent ids
            if ($id != $this->id) {
                $ids_array[] = $id;
            }
        }
        //If no child ,just return self
        if (empty($ids_array)) {
            $ids_array = [$this->id];
        }
        return $ids_array;
    }
}
