<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubmitController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('submit');
    }

    public function create(Request $request) {
        $data = $request->validate([
            'image' => 'image',
            'title' => 'required|max:255',
            'url' => 'url',
            'description' => 'max:255',
            'school' => 'required|max:255',
            'address' => 'required|max:255',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required'
        ]);
        
        $user = \Auth::user();
        $image = $request->file('image')->store('public/covers');

        $geocode = \Geocoder::getCoordinatesForAddress($data['address']);
        
        $data['slug'] = substr(sha1(time()), 0, 10).'-'.Str::slug($data['title']);
        $data['image'] = str_replace('public', 'storage', $image);
        $data['user_id'] = $user->id;
        $data['latitude'] = $geocode['lat'];
        $data['longitude'] = $geocode['lng'];

        $event = tap(new \App\Event($data))->save();

        return redirect('/');
    }
}
