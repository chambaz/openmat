@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($events as $event)
            <div class="card">
                <div class="card-header">{{ $event->title }}</div>

                <div class="card-body">
                    {{ $event->description }}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
