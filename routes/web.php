<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

Auth::routes();

Route::get('/', function(Request $request) {
    $lat = $request->input('lat');
    $lng = $request->input('lng');
    $query = $request->input('q', false);
    $date = $request->input('date', date('Y-m-d'));
    $miles = $request->input('radius', 100);

    $events = DB::table('events')
        ->where('date', '>=', $date);

    if ($lat && $lng) {
        $events = $events
            ->whereBetween('latitude', [$lat - ($miles * 0.018), $lat + ($miles * 0.018)])
            ->whereBetween('longitude', [$lng - ($miles * 0.018), $lng + ($miles * 0.018)]);
    }

    if ($query) {
        $events = $events
            ->where('school', 'like', "%{$query}%")
            ->orWhere('title', 'like', "%{$query}%");
    }

    return view('listing', ['events' => $events->get()]);
});

Route::get('/events/{slug}', function($slug) {
    $event = App\Event::where('slug', $slug)
        ->orderBy('date', 'desc')
        ->first();

    if (!$event) {
        abort(404);
    }

    return view('single', ['event' => $event]);
});

Route::get('/home', 'HomeController@index');
Route::get('/submit', 'SubmitController@index');
Route::post('/submit', 'SubmitController@create');
Route::get('/api/events', 'APIController@events');
