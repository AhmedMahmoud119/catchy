@extends('admin.layouts.app')

@section('header')

@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <div class="mr-3"><h2>Shipping Companies Management</h2></div>
                <div class="my-lg-0 my-1">
                    @can('shipping-company-create')
                    <a href="{{ route('admin.shipping-companies.create') }}"
                       class="btn btn-sm btn-info font-weight-bolder text-uppercase">Create New Shipping Companies</a>
                    @endcan
                </div>
            </div>
            <br>

            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>address</th>
                    <th>phone</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($shippingCompanies as $key => $shippingCompany)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $shippingCompany->name }}</td>
                        <td>{{ $shippingCompany->address }}</td>
                        <td>{{ $shippingCompany->phone }}</td>
                        <td>
                            @can('shipping-company-edit')
                                <a class="btn btn-primary" href="{{ route('admin.shipping-companies.edit',$shippingCompany->id) }}">Edit</a>
                            @endcan
                            @can('shipping-company-delete')
                                <form method="POST" action="{{route('admin.shipping-companies.destroy',$shippingCompany->id)}}"
                                      style="display: inline">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger">{{__('messages.delete')}}</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </table>


            {!! $shippingCompanies->render() !!}
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('/assets/scripts/map.js')}}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?v=3&libraries=places&key=AIzaSyDQiN4qc7pC9b1BRQwkqXXD28peMfWcHvw&callback=myMap"></script>
    <script src="{{asset('assets/select2/select2.min.js')}}"></script>

@endsection
