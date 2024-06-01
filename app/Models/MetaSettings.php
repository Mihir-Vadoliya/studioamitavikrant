<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaSettings extends Model
{
    use HasFactory;

    protected $fillable = [
        'refferance_id',
        'page',
        'meta_details',
    ];
}
