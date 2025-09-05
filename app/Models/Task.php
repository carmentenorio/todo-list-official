<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    protected $casts = [
        'completed'  => 'boolean',
        'deleted_at' => 'datetime',
    ];
    /**
     * RETURN  of categories
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Category, Task>
     */
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
