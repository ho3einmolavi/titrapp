<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded=[];
    public  function sender()
    {
        return $this->belongsTo(User::class,'sender_user_id');
    }


    public  function receiver()
    {
        return $this->belongsTo(User::class,'receiver_user_id');
    }
}