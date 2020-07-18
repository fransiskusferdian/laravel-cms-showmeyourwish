<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
     protected $fillable = [
       'title', 'slug', 'summary', 'content', 'image' ,'link'
    ];

    protected $hidden = [

    ];
}
