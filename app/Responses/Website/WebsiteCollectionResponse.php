<?php

namespace App\Responses\Website;

use App\Http\Resources\Website\WebsiteCollection;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

readonly class WebsiteCollectionResponse implements Responsable
{
    public function __construct(
        private Collection|LengthAwarePaginator $collection,
        private int $status = 200,
    ) {}

    /**
     * @inheritDoc
     */
    public function toResponse($request): JsonResponse
    {
        return response()->json(
            data: WebsiteCollection::make(
                resource: $this->collection
            )->response()->getData(),
            status: $this->status,
        );
    }
}
