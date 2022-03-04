<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

/** @mixin \App\Models\Course */
class CourseResource extends JsonResource
{
    /**
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'price_in_offer' => $this->price_in_offer,
            'is_offer' => $this->is_offer,
            'status' => $this->status,
            'category' => $this->category,
            'created_by' => $this->creator,
        ];
    }
}
