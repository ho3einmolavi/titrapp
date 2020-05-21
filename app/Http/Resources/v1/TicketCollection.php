<?php

namespace App\Http\Resources\v1;

use App\Enums\Priority;
use App\Enums\TicketStatus;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Morilog\Jalali\Jalalian;

class TicketCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return[
            'data'=> $this->collection->map(function ($item){

                switch ($item->status) {
                    case TicketStatus::waiting:
                        $color = '#f39c12';
                        break;
                    case TicketStatus::customeAnswere:
                        $color = '#27ae60';
                        break;
                    case TicketStatus::adminAnswere:
                        $color = '#27ae60';
                        break;
                    case TicketStatus::closed:
                        $color = '#7f8c8d';
                        break;
                    default:
                        $color = '#f39c12';
                }
                return[
                    'id' => $item->id,
                    'title' => $item->title,
                    'body' => $item->body,
                    'category' => $item->category->name,
                    'priority' => Priority::getPriority($item->priority),
                    'status' => TicketStatus::getTicketStatus($item->status),
                    'statusColor' => $color,
                    'file' => url($item->file),
                    'updated_at' =>Jalalian::forge($item->updated_at)->ago() ,
                    'created_at' => Jalalian::forge($item->created_at)->format('Y-m-d : H:i:s'),
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
