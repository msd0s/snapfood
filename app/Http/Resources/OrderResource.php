<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'carts'=> [
                'id'=> $this->id,
                'restaurant'=>OrderRestaurantResource::make($this->restaurant),
                'foods'=> OrderFoodResource::collection($this->orderfoods),
                'created_at'=> $this->created_at->toDateTimeString(),
                'updated_at'=> $this->updated_at->toDateTimeString(),
                ]
        ];
    }
}
