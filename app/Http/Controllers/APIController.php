<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{
    public function events(Request $request)
    {
        if (!$request->has(['lat', 'lng'])) {
            return response()->json(array(
                'error' => 'Lat / lng parameters required'
            ))->setStatusCode(400);
        }

        $lat = $request->input('lat');
        $lng = $request->input('lng');
        $miles = $request->input('radius', 100);

        $events = DB::table('events')
            ->whereBetween('latitude', [$lat - ($miles * 0.018), $lat + ($miles * 0.018)])
            ->whereBetween('longitude', [$lng - ($miles * 0.018), $lng + ($miles * 0.018)])
            ->get();

        return response()->json($events);
    }
}
