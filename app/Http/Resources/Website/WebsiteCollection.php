<?php

namespace App\Http\Resources\Website;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class WebsiteCollection extends ResourceCollection
{
    public $collects = WebsiteResource::class;

    /**
     * Transform the resource collection into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection,
        ];
    }
}
