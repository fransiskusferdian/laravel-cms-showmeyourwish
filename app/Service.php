<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
     protected $fillable = [
       'title', 'slug', 'summary', 'content', 'image', 'link', 'price'
    ];

    protected $hidden = [

    ];
}
