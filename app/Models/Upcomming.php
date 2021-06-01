<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upcomming extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function categoryname()
    {
        return $this->belongsTo(Category::class, 'category_id')->select('id', 'category_name');
    }
}
