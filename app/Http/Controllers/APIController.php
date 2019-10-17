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
        $query = $request->input('q', false);
        $date = $request->input('date', date('Y-m-d'));
        $miles = $request->input('radius', 100);

        $events = DB::table('events')
            ->where('date', '>=', $date)
            ->whereBetween('latitude', [$lat - ($miles * 0.018), $lat + ($miles * 0.018)])
            ->whereBetween('longitude', [$lng - ($miles * 0.018), $lng + ($miles * 0.018)]);
        
        if ($query) {
            $events = $events
                ->where('school', 'like', "%{$query}%")
                ->orWhere('title', 'like', "%{$query}%");
        }

        return response()->json($events->get());
    }
}
