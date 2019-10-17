@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $event->date }}: {{ $event->title }}</div>

                @if ($event->image)
                <img src="/{{ $event->image }}" />
                @endif
                
                <div class="card-body">
                    {{ $event->description }}

                    <hr />

                    <a href="{{ $event->url }}" target="_blank">
                        {{ $event->url }}
                    </a><br />

                    {{ $event->school }}<br />
                    {{ $event->address }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
