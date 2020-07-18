<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'name'
    ];

    protected $hidden = [

    ];

     public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }
}
