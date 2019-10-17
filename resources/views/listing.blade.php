@extends('layouts.app')

@section('content')
<div class="container">
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
