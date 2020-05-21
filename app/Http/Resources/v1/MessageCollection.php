<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Morilog\Jalali\Jalalian;

class MessageCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return[
            'data'=> $this->collection->map(function ($item){
                return[
                    'id' => $item->id,
                    'user'=>[
                        'id'=>$item->sender->id,
                        'username'=>$item->sender->phone,
                        'name'=>$item->sender->name,
                    ],
                    'message_type' => $item->type,
                    'seen' => $item->seen,
                    'body' => is_null($item->body)?'':$item->body,
                    'voice' => is_null($item->voice)?'':$item->voice,
                    'date'=>$item->created_at,
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
