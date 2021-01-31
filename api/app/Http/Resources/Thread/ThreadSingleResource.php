<?php

namespace App\Http\Resources\Thread;

use Illuminate\Http\Resources\Json\JsonResource;

class ThreadSingleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $attrs = [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'type' => $this->type,
            'user' => $this->user,
            'created_at' => $this->created_at->diffForHumans()
        ];

        if ($this->type === 'TEXT') {
            $attrs['body'] = $this->body;
        } else {
            $attrs['link'] = $this->link;
            $attrs['thumbnail'] = $this->thumbnail;
        }

        return $attrs;
    }
}
