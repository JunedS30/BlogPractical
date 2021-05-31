<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'blog_Name', 'blog_Description', 'start_Date', 'end_Date', 'is_Active', 'image','created_By',
    ];
}
