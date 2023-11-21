@extends('admin.layouts.app')

@section('header')

@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Create New Shipping Company</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('admin.shipping-companies.index') }}">Back</a>
                    </div>
                </div>
            </div>
    <form method="POST" action="{{route('admin.shipping-companies.store')}}">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" value="" class="form-control" name="name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Address:</strong>
                    <textarea type="text" class="form-control" name="address"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Phone:</strong>
                    <input type="number" value="" class="form-control" name="phone">
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
