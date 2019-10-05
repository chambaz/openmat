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

Auth::routes();

Route::get('/', function () {
    $events = \App\Event::all();
    return view('listing', ['events' => $events]);
});

Route::get('/submit', function () {
    return view('submit');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/submit', function (Request $request, Faker $faker) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required|max:255',
        'school' => 'required|max:255',
        'address' => 'required|max:255',
        'date' => 'required|date',
        'start_time' => 'required',
        'end_time' => 'required'
    ]);

    $data['latitude'] = $faker->latitude();
    $data['longitude'] = $faker->longitude();

    $event = tap(new App\Event($data))->save();

    return redirect('/');
});
