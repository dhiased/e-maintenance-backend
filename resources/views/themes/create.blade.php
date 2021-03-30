@extends('themes.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New theme</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('themes.index') }}"> Back</a>
            </div>
        </div>
    </div>

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

    <form action="{{ route('themes.store') }}" method="POST">
        @csrf



        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">

                {{-- <div name="option" class="dropdown">
                    <a class="btn btn-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Select a Technology first
                    </a>

                    <ul name="option" class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        @foreach ($technologies as $tech)
                            <li name="option"><a name="option" class="dropdown-item form-control"
                                    href="#"></a>{{ $tech->name }}</li>
                        @endforeach
                    </ul>
                </div> --}}


                <select name="technology_id" id="type" class="form-control">
                     @foreach ($technologies as $tech)
                    <option value={{$tech->id}}>{{ $tech->name }}</option>
                     @endforeach
                    {{-- <option value="2" selected>COM02</option>
                    <option value="3">COM03</option>
                    // ... the rest of the options --}}
                </select>

                {{-- <option name="option">Select Item</option>
                @foreach ($technologies as $tech)
                    <option name={{ $tech->id }}>
                        {{ $tech->name }}
                    </option>
                @endforeach
                </select> --}}



                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Enter Title">
                </div>


            </div>

            {{-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" style="height:150px" name="description" placeholder="Enter Description"></textarea>
            </div>
        </div> --}}
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
