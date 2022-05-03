<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
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
            'id'            => (string)$this->id,
            'attributes'    =>
            [
                'title'         => $this->title,
                'slug'          => $this->slug,
                'text'          => $this->text,
                'user_id'       => $this->user_id,
                'created_at'    => $this->created_at,
                'updated_at'    => $this->updated_at
            ],
        ];
    }
}
