@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/" method="GET">
        <div class="form-row" style="padding: 10px 0 40px;">
            <div class="col-md-3">
                <label style="margin-top: 10px;" for="inputEmail4">Address</label>
                <input type="text" class="form-control" placeholder="e.g 1175 State Street">
            </div>
            <div class="col-md-3">
                <label style="margin-top: 10px;" for="inputEmail4">Date</label>
                <input type="date" class="form-control" name="date" placeholder="Date">
            </div>
            <div class="col-md-3">
                <label style="margin-top: 10px;" for="inputEmail4">Search...</label>
                <input type="search" class="form-control" name="q" placeholder="e.g Ronin BJJ">
            </div>
            <div class="col-md-2">
                <label style="margin-top: 10px;" for="inputEmail4">Radius</label>
                <select id="inputState" name="radius" class="form-control">
                    <option selected>50</option>
                    <option>100</option>
                    <option>200</option>
                    <option>300</option>
                    <option>400</option>
                </select>
            </div>
            <div class="col-md-1">
                <button style="margin-top: 40px;" type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($events as $event)
            <div class="card">
                <div class="card-header">{{ $event->date }}: {{ $event->title }}</div>

                @if ($event->image)
                <img src="/{{ $event->image }}" />
                @endif
                
                <div class="card-body">
                    {{ $event->description }}

                    <p style="margin-top: 20px;"><a href="/events/{{ $event->slug }}">View event</a></p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
