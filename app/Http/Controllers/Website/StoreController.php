<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\WebsiteStoreRequest;
use App\Models\Website;
use App\Responses\Website\WebsiteResourceResponse;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(WebsiteStoreRequest $request): WebsiteResourceResponse
    {
        $website = Website::create([
            'name' => $request->name,
            'logo_url' => $request->logo_url,
            'website_url' => $request->website_url,
            'deletion_url' => $request->deletion_url,
        ]);

        if ($request->has('steps')) {
            $website->steps()->createMany($request->steps);
        }

        return new WebsiteResourceResponse(
            resource: $website
        );
    }
}
