<?php

namespace App\Http\Resources\v1;

use App\Enums\UserType;
use Illuminate\Http\Resources\Json\JsonResource;
use Morilog\Jalali\Jalalian;

class UserResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' =>!empty( $this->id) ?  $this->id : '',
            'name' => !empty($this->name) ? $this->name : '',
            'city' => !empty($this->city_id) ?
                [
                    'id'=>intval($this->city_id),
                    'name'=>!empty($this->city->name) ? $this->city->name : ''
                ]
                : null,
            'phone' => !empty($this->phone) ? $this->phone : '',
            'phoneshow' => !empty($this->phoneshow) ? $this->phoneshow : '',
            'email' => !empty($this->email) ? $this->email : '',
            'instagram' => !empty($this->instagram) ? $this->instagram : '',
            'telegram' => !empty($this->telegram) ? $this->telegram : '',
            'whatsapp' => !empty($this->whatsapp) ? $this->whatsapp : '',
            'isVip' =>$this->isVip(),
            'expireTime' =>Jalalian::forge($this->vipTime)->format('Y-m-d  H:i:s'),
            'created_at' => Jalalian::forge($this->created_at)->format('Y-m-d  H:i:s'),
            'api_token' => 'Bearer '.$this->api_token,
        ];
    }
    public function with($request)
    {
        return [
            'success' => true
        ];
    }

}
