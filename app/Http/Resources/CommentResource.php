<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'comments'=> [
                'author'=> CommentUserResource::make($this->user),
                'foods'=>CommentFoodResource::collection($this->order->orderfoods),
                'created_at'=> $this->created_at->toDateTimeString(),
                'score'=> $this->score,
                'comment'=> $this->comment,
                'answer'=> $this->answer,
                ]
        ];
    }
}
