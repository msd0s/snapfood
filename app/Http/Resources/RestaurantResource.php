<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
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
            'id'=> $this->id,
            'title'=> $this->name,
            'type'=> RestaurantCategoryResource::collection($this->restaurantCategories),
            'address'=> RestaurantAddressResource::make($this->address),
            'is_open'=> $this->restaurant_status,
            'image'=> asset('storage/restaurants/'.$this->picture),
            'score'=> $this->score,
            'comments_count'=> $this->comment_count,
            'schedule'=> ScheduleResource::collection($this->schedules),
        ];
    }
}
