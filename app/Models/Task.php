<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    protected $fillable = ['title', 'description', 'completed'];
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
    public function categories()
    {
        //recupera trodoslos registrso
        return $this->belongsToMany(Category::class);
    }

}
