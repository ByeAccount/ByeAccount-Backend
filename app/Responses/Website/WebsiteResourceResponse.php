<?php

namespace App\Responses\Website;

use App\Http\Resources\Website\WebsiteResource;
use App\Models\Website;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;

readonly class WebsiteResourceResponse implements Responsable
{
    public function __construct(
        private Website $resource,
        private int $status = 200,
    ) {}

    /**
     * {@inheritDoc}
     */
    public function toResponse($request): JsonResponse
    {
        return response()->json(
            data: new WebsiteResource(
                resource: $this->resource
            ),
            status: $this->status,
        );
    }
}
