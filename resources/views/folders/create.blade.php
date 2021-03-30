@extends('folders.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New folder</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('folders.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <br>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('folders.store') }}" method="POST">
        @csrf



        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">


                <select name="technology_id" id="type" class="form-control">

                    @foreach ($technologies as $tech)
                        <option value={{ $tech->id }}>{{ $tech->name }}</option>

                    @endforeach

                </select>

                <br>
                <select name="theme_id" id="type" class="form-control">

                    @foreach ($themes as $theme)

                        <option value={{ $theme->id }}>{{ $theme->name }}</option>
                    @endforeach

                </select>



                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Enter Title">
                </div>


            </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
