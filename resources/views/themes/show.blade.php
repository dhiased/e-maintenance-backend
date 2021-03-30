@extends('themes.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Theme</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('themes.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{ $theme->name }}
            </div>
        </div>
        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $theme->description }}
            </div>
        </div> --}}
    </div>
@endsection