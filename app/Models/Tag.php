<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Tag extends Model
{
    //protected $fillable = ['name'];
    //relacion muchos a muchos
    public function tasks(){
        return $this->belongsToMany(Task::class, 'task_tag');
    }
}
 