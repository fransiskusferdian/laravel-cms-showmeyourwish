<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
       'name', 'slug', 'category_id','sub_category_id', 'directory', 'content'
    ];

    protected $hidden = [

    ];

    public function display() 
    {
        return $this->belongsTo(Gallery::class, 'directory', 'directory')->where('is_thumbnail', 1);
    }

    public function subcategory() 
    {
        return $this->belongsTo(Subcategory::class, 'sub_category_id', 'id');
    }

    public function category() 
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

  
}
