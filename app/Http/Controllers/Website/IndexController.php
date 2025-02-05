<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\WebsiteFilterRequest;
use App\Models\Website;
use App\Responses\Website\WebsiteCollectionResponse;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(WebsiteFilterRequest $request): WebsiteCollectionResponse
    {
        $nameFilter = $request->query('name');

        $websites = Website::where('name', 'like', "%$nameFilter%")
            ->orderBy('name')
            ->paginate(10);

        return new WebsiteCollectionResponse(
            collection: $websites
        );
    }
}
