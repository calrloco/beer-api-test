<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BeerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $page = $request->get('page', 1);
        $perPage = $request->get('per_page', 9);
        $baseUrl = config('services.punk_api.base_url');

        /* Getting the beers and caching the response, the items are
           cached for 24H since the data doesn't change often.  */
        $beers = cache()->remember("punk_api_response_page-$page-per_page-$perPage", 60 * 60 * 24, function () use ($baseUrl, $page, $perPage) {
            $response = Http::get("$baseUrl?page=$page&per_page=$perPage");
            return $response->collect();
        });

        return [
            'beers' => $beers
        ];
    }
}
