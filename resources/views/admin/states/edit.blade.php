@extends('admin.layouts.app')

@section('header')

@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <div class="mr-3"><h2>Edit {{__('messages.region')}}</h2></div>
                <div class="my-lg-0 my-1">
                    <a class="btn btn-sm btn-info font-weight-bolder text-uppercase"
                       href="{{ route('admin.states.index') }}"> Back</a>
                </div>
            </div>
            <br>

            <form method="POST" action="{{route('admin.states.update',$state->id)}}">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" value="{{$state->name}}" class="form-control" name="name">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{__('messages.countries')}}:</strong>
                            <select name="country_id" class="form-control">
                                <option value="">{{__('messages.select')}}</option>
                                @foreach($countries as $country)
                                    <option {{$state->country_id == $country->id?'selected':''}}
                                            value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')

    <script type="text/javascript" src="{{asset('/assets/scripts/map.js')}}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?v=3&libraries=places&key=AIzaSyDQiN4qc7pC9b1BRQwkqXXD28peMfWcHvw&callback=myMap"></script>
    <script src="{{asset('assets/select2/select2.min.js')}}"></script>

@endsection
