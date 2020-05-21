<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded=[];
    public function scopeFilter($query)
    {
        $province_id = request('province_id');

        if (isset($province_id) && trim($province_id) != '') {
            $query->where('province_id', $province_id);
        }
        return $query;
    }
}
