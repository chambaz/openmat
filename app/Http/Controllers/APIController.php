<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APIController extends Controller
{
    public function index()
    {
        $events = \App\Event::with('user')->get();
        return response()->json($events);
    }
}
