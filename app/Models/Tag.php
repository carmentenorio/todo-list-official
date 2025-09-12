<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Tag extends Model
{
    use SoftDeletes;
     protected $casts = [
        'completed'  => 'boolean',
        'deleted_at' => 'datetime',
    ];
    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }
}
