<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Word extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'tagling' => $this->tagline,
            'description' => $this->description,
            'rating_us' => $this->rating_us,
            'rating_visitors' => $this->rating_visitors,
            'eligibility' => $this->eligibility,
            'link' => $this->link,
            'color' => $this->color,
            'language' => $this->language->language,
            'category' => $this->category->category,
            'sponsored' => $this->sponsored,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'photo' => $this->photo,
        ];
    }
}
