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

        $events = DB::select("
            SELECT * FROM events WHERE
            events.latitude BETWEEN ({$lat} - ({$miles}*0.018)) AND ({$lat} + ({$miles}*0.018)) AND
            events.longitude BETWEEN ({$lng} - ({$miles}*0.018)) AND ({$lng} + ({$miles}*0.018));
        ");

        return response()->json($events);
    }
}
