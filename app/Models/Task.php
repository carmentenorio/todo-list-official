<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    //asignacion masiva fillable
    //protected $fillable = ['title', 'description'];
    use Softdeletes;
    protected $dates = ['deleted_at'];


    //relacion uno a muchos inversa
public function category()
    { //belongs to devueve una sola categoria
        return $this->belongsTo(Category::class);
    }
    //relacion muchos a muchos
    public function tags(){
        return $this->belongsToMany(Tag::class, 'task_tag');
    }
}
