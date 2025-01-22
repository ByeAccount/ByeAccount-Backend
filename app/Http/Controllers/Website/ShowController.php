<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Website;
use App\Responses\Website\WebsiteResourceResponse;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, int $id): WebsiteResourceResponse
    {
        $website = Website::findOrFail($id);

        return new WebsiteResourceResponse(
            resource: $website
        );
    }
}
