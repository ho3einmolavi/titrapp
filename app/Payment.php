<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded=[];
    public  function  user()
    {
        return $this->belongsTo(User::class);
    }


    public function scopeFilter($query)
    {
        $type = request('type');
        $status = request('status');
        $user_id = request('user_id');

        if (isset($type) && trim($type) != '') {
            $query->where('type', $type);
        }

        if (isset($status) && trim($status) != '') {
            $query->where('status', $status);
        }
        if (isset($user_id) && trim($user_id) != '') {
            $query->where('user_id', $user_id);
        }

        return $query;
    }
}
