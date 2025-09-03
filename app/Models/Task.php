<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        public function categories()
    {
        return $this->hasMany(Category::class);
    }
    
}
