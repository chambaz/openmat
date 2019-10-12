@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Submit an event</h1>
                <form action="/submit" method="post">
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            Please fix the following errors
                        </div>
                    @endif

                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="title">File upload</label>
                        <div id="file" class="dropzone"></div> 
                    </div> 
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ old('title') }}">
                        @if($errors->has('title'))
                            <span class="help-block">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" name="date" placeholder="Date" value="{{ old('date') }}">
                        @if($errors->has('date'))
                            <span class="help-block">{{ $errors->first('date') }}</span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('start_time') ? ' has-error' : '' }}">
                        <label for="start_time">Start Time</label>
                        <input type="text" class="form-control" id="start_time" name="start_time" placeholder="Start Time" value="{{ old('start_time') }}">
                        @if($errors->has('start_time'))
                            <span class="help-block">{{ $errors->first('start_time') }}</span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('end_time') ? ' has-error' : '' }}">
                        <label for="end_time">End Time</label>
                        <input type="text" class="form-control" id="end_time" name="end_time" placeholder="End Time" value="{{ old('end_time') }}">
                        @if($errors->has('end_time'))
                            <span class="help-block">{{ $errors->first('end_time') }}</span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="school">School</label>
                        <input type="text" class="form-control" id="school" name="school" placeholder="School" value="{{ old('school') }}">
                        @if($errors->has('school'))
                            <span class="help-block">{{ $errors->first('school') }}</span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Description">{{ old('description') }}</textarea>
                        @if($errors->has('description'))
                            <span class="help-block">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" name="address" placeholder="Address">{{ old('address') }}</textarea>
                        @if($errors->has('address'))
                            <span class="help-block">{{ $errors->first('address') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
  <script>
    var drop = new Dropzone('#file', {
      createImageThumbnails: false,
      addRemoveLinks: true,
      url: '/file',
      headers: {
        'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
      }
    });
  </script>
@endsection