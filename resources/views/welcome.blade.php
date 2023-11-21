@extends('admin.layouts.app')

@section('header')
    <style>
        .statistic-card{
            box-shadow: 1px 2px 5px #565656;
        }
    </style>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <div class="mr-3"><h2>{{__('messages.dashboard')}}</h2></div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="statistic-card d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                        <span class="symbol symbol-50 symbol-light-success mr-2">
                            <span class="symbol-label">
                                <span class="svg-icon svg-icon-xl svg-icon-success">
                                    <i class="fa-regular fa-user"></i>
                                </span>
                            </span>
                        </span>
                        <div class="d-flex flex-column text-right">
                            <span class="text-dark-75 font-weight-bolder font-size-h3">{{$customersCount}}</span>
                            <span class="text-muted font-weight-bold mt-2">{{__('messages.customers count')}}</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <div class="statistic-card d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                        <span class="symbol symbol-50 symbol-light-success mr-2">
                            <span class="symbol-label">
                                <span class="svg-icon svg-icon-xl svg-icon-success">
                                    <i class="fa-regular fa-user"></i>
                                </span>
                            </span>
                        </span>
                        <div class="d-flex flex-column text-right">
                            <span class="text-dark-75 font-weight-bolder font-size-h3">{{$ordersCount}}</span>
                            <span class="text-muted font-weight-bold mt-2">{{__('messages.orders count')}}</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <div class="statistic-card d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                        <span class="symbol symbol-50 symbol-light-success mr-2">
                            <span class="symbol-label">
                                <span class="svg-icon svg-icon-xl svg-icon-success">
                                    <i class="fa-regular fa-user"></i>
                                </span>
                            </span>
                        </span>
                        <div class="d-flex flex-column text-right">
                            <span class="text-dark-75 font-weight-bolder font-size-h3">{{$ordersCompletedCount}}</span>
                            <span class="text-muted font-weight-bold mt-2">{{__('messages.orders completed count')}}</span>
                        </div>
                    </div>
                </div>

            </div>
            <br>
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="statistic-card d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                        <span class="symbol symbol-50 symbol-light-success mr-2">
                            <span class="symbol-label">
                                <span class="svg-icon svg-icon-xl svg-icon-success">
                                    <i class="fa-regular fa-user"></i>
                                </span>
                            </span>
                        </span>
                        <div class="d-flex flex-column text-right">
                            <span class="text-dark-75 font-weight-bolder font-size-h3">{{$productsCount}}</span>
                            <span class="text-muted font-weight-bold mt-2">{{__('messages.products count')}}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('/assets/scripts/map.js')}}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?v=3&libraries=places&key=AIzaSyDQiN4qc7pC9b1BRQwkqXXD28peMfWcHvw&callback=myMap"></script>
    <script src="{{asset('assets/select2/select2.min.js')}}"></script>

@endsection
