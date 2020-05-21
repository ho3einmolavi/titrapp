<?php

namespace App\Http\Resources\v1;

use App\Enums\TicketType;
use App\Ticket;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Morilog\Jalali\Jalalian;

class ReplyCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return[
            'data'=> $this->collection->map(function ($item){
                return[
                    'id' => $item->id,
                    'user' => [
                        'id'=>$item->user->id,
                        'name'=> $item->user->first_name.' '.  $item->user->last_name
                    ],
                    'body' => !empty($item->body) ? $item->body : '',
                    'file' => !empty($item->file)? url($item->file) : '',
                    'type' => $item->type,
                    'created_at' =>$item->created_at ,
                ];
            })
        ];

    }
    public function with($request)
    {
        return [
            'success'=>true
        ];
    }
}
