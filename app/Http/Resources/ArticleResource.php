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
            'type'          => 'articles',
            'id'            => (string)$this->id,
            'attributes'    =>
            [
                'title'         => $this->title,
                'text'          => $this->text,
                'created_at'    => $this->created_at->format('Y-m-d')
            ],
        ];
    }
}
