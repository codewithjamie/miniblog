<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $publishedAt = $this->published_at ? \Carbon\Carbon::parse($this->published_at) : null;

        return [
            'id' => $this->id,
            'title' => $this->title,
            'permalink' => $this->permalink,
            'description' => $this->description,
            'content' => $this->content,
            'author_id' => $this->author_id,
            'is_featured' => $this->is_featured,
            'status' => $this->status,
            'published_at' => $publishedAt ? $publishedAt->toDateTimeString() : null,
            'image' => $this->image
        ];
    }
}
