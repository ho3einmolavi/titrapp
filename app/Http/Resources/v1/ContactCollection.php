<?php

namespace App\Http\Resources\v1;

use App\User;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ContactCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return[
            'data'=> $this->collection->map(function ($item){

                if (auth()->user()->id == $item->receiver_user_id ){
                    $user_id = $item->sender_user_id;
                }
                else if (auth()->user()->id == $item->sender_user_id)
                {
                    $user_id = $item->receiver_user_id;
                }
                return[
                    'contact_id' =>!empty($item->id) ? $item->id : '',
                    'id' => $user_id ? $user_id : '',
                    'phone' => !empty(User::find($user_id)->phone)? User::find($user_id)->phone : '',
                    'name' => !empty(User::find($user_id)->name)? User::find($user_id)->name : '',
                    'unred'=>\App\Message::where('receiver_user_id', auth()->user()->id)->where('sender_user_id' ,$user_id )->where('seen', false)->get()->count()
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
