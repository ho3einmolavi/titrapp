<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketReply extends Model
{
    protected $guarded=[];

    public function  user(){
        return $this->belongsTo(User::class);
    }

}
