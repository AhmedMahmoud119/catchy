@extends('admin.layouts.app')

@section('header')

@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Create New Shipping Company Costs</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('admin.shipping-company-costs.index') }}">Back</a>
                    </div>
                </div>
            </div>
    <form method="POST" action="{{route('admin.shipping-company-costs.store')}}">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Shipping Company:</strong>
                    <select name="shipping_company_id" class="form-control">
                        <option value="">{{__('messages.select')}}</option>
                        @foreach($shippingCompanies as $shippingCompany)
                            <option value="{{$shippingCompany->id}}">{{$shippingCompany->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>States:</strong>
                    <select name="state_id[]" multiple class="form-control">
                        @foreach($states as $state)
                            <option value="{{$state->id}}">{{$state->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="number" value="" class="form-control" name="price">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Refund Price:</strong>
                    <input type="number" value="" class="form-control" name="refund_price">
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
