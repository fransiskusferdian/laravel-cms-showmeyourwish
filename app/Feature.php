<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
     protected $fillable = [
       'title', 'slug', 'summary', 'content', 'image', 'icon' ,'link'
    ];

    protected $hidden = [

    ];
}
