<?php

namespace App\Http\Resources\Comment;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return array_merge(parent::toArray($request), [
            'user' => $this->user,
            'replies' => CommentResource::collection($this->replies),
            'created_at' => $this->created_at->diffForHumans()
        ]);
    }
}
