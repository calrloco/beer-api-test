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
        $beers = Http::get("$baseUrl?page=$page&per_page=$perPage");

        return [
            'beers' => $beers->collect()
        ];
    }
}
