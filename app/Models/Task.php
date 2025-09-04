<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    protected $fillable = ['title', 'description'];

    /*public function categories()
    {
        return $this->hasMany(Category::class);
    }
    public function tags()
    {
        return $this->hasMany(Tag::class);
    }*/
    /**
     * RETURN  of categories
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Category, Task>
     */

    use Softdeletes;
    protected $dates = ['deleted_at'];
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

}
