<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded =[];
    public  function  category()
    {
        return $this->belongsTo(CategoryForBlog::class , 'category_for_blog_id');
    }


    public function scopeFilter($query)
    {
        $category_id = request('category_id');

        if (isset($category_id) && trim($category_id) != '') {
            $query->where('category_id', $category_id);
        }
        return $query;
    }


}
