@extends('admin.layouts.app')

@section('header')

@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table table-bordered table-checkable" id="kt_datatable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>User Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Country</th>
                    <th>City</th>
                </tr>
                </thead>
                <tbody>
                @foreach($customers as $key=> $customer)
                    <tr>
                        <td>{{$key+1}}</td>
{{--                        <td>{{$customer->user_id}}</td>--}}
                        <td>{{$customer->first_name}}</td>
                        <td>{{$customer->last_name}}</td>
                        <td>{{$customer->user_name}}</td>
                        <td>{{$customer->userMetaPhone->meta_value??''}}</td>
                        <td>{{$customer->email}}</td>
                        <td>{{$customer->country}}</td>
                        <td>{{$customer->city}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{$customers->links()}}
            <!--end: Datatable-->
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('/assets/scripts/map.js')}}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?v=3&libraries=places&key=AIzaSyDQiN4qc7pC9b1BRQwkqXXD28peMfWcHvw&callback=myMap"></script>
    <script src="{{asset('assets/select2/select2.min.js')}}"></script>

@endsection
