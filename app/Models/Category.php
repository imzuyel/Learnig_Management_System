<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parent_id')->where('status', 1);
    }

    public function parentcategory()
    {
        return $this->belongsTo(Category::class, 'parent_id')->select('id', 'category_name');
    }
    public function posts()
    {
        return $this->hasMany(Post::class)->where('parent_id',0);
    }


}
