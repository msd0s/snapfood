<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FoodResource extends JsonResource
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
            'id'=>$this->id,
            'title'=>$this->name,
            'price'=>$this->price,
            'off'=>FoodDiscountResource::collection($this->discounts),
            'raw_materials'=>$this->raw_materials,
            'image'=>asset('storage/foods/'.$this->picture)
        ];
    }
}
