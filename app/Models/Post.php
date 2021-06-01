<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function categoryname()
    {
        return $this->belongsTo(Category::class, 'category_id')->select('id', 'category_name');
    }
    public function username()
    {
        return $this->belongsTo(User::class, 'user_id')->select('id', 'name');
    }
}
