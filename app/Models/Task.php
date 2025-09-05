<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    protected $fillable = ['title', 'description'];
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
