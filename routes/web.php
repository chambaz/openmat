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

Route::get('/', function() {
    $events = App\Event::with('user')->orderBy('date', 'desc')->get();
    return view('listing', ['events' => $events]);
});

Route::get('/home', 'HomeController@index');
Route::get('/submit', 'SubmitController@index');
Route::post('/submit', 'SubmitController@create');
Route::get('/api/events', 'APIController@events');
