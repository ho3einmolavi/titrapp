<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $guarded=[];

    public  function  category(){
        return $this->belongsTo(TicketCategory::class,'category_id');
    }

    public function scopeFilter($query)
    {
        $title = request('title');
        $status = request('status');
        $priority = request('priority');
        $category = request('category');

        if (isset($title) && trim($title) != '') {
            $query->where('title', 'LIKE', '%' . $title . '%');
        }

        if (isset($priority) && trim($priority) != '') {
            $query->where('priority', $priority);
        }

        if (isset($status) && trim($status) != '') {
            $query->where('status', $status);
        }


        if (isset($category) && trim($category) != '') {
            $query->where('category_id', $category);
        }


        return $query;
    }
}
