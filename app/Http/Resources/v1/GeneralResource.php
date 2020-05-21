<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class GeneralResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'phone1' =>!empty( $this->phone1) ?  $this->phone1 : '',
            'phone2' => !empty($this->phone2) ? $this->phone2 : '',
            'address' => !empty($this->address) ? $this->address : '',
            'instagram' => !empty($this->instagram) ? $this->instagram : '',
            'telegram' => !empty($this->telegram) ? $this->telegram : '',
            'whatsapp' => !empty($this->whatsapp) ? $this->whatsapp : '',
            'facebook' => !empty($this->facebook) ? $this->facebook : '',
            'twitter' => !empty($this->twitter) ? $this->twitter : '',
            'aboutus' => !empty($this->aboutus) ? $this->aboutus : '',
            'guide' => !empty($this->guide) ? $this->guide : '',
            'services' => !empty($this->services) ? $this->services : '',
        ];
    }
    public function with($request)
    {
        return [
            'success' => true
        ];
    }

}
