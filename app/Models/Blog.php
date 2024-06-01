<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['name','image','content','category_id', 'page', 'date', 'relatedBogs', 'isActive'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
