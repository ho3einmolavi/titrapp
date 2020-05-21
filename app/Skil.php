<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skil extends Model
{
    protected $guarded = [];

    public  function  category()
    {
        return $this->belongsTo(Category::class);
    }
}