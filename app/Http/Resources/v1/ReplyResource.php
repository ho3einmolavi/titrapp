<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class ReplyResource extends JsonResource
{
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'user' => [
                'id'=>$this->user->id,
                'name'=> $this->user->first_name.' '.  $this->user->last_name
            ],
            'body' => !empty($this->body)?$this->body : '',
            'file' => !empty($this->file)? url($this->file) : '',
            'type' => $this->type,
            'created_at' =>$this->created_at ,
        ];
    }
    public function with($request)
    {
        return [
            'success' => true
        ];
    }

}
