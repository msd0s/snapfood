<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NearRestaurantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'Restaurant id'=> $this->restaurantid,
            'Address id'=> $this->addressid,
            'name'=> $this->name,
            'score'=> $this->score,
            'address'=> $this->address,
            'latitude'=> $this->latitude,
            'longitude'=> $this->longitude,
            'distance'=> $this->distance,
        ];
    }
}
