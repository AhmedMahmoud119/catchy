@extends('admin.layouts.app')

@section('header')

@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <div class="mr-3"><h2>Shipping Company Costs Management</h2></div>
                <div class="my-lg-0 my-1">
                    @can('shipping-company-create')
                    <a href="{{ route('admin.shipping-company-costs.create') }}"
                       class="btn btn-sm btn-info font-weight-bolder text-uppercase">Create New Shipping Cost</a>
                    @endcan
                </div>
            </div>
            <br>

            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Company Name</th>
                    <th>States</th>
                    <th>Price</th>
                    <th>Refund Price</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($shippingCompanyCosts as $key => $shippingCompanyCost)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $shippingCompanyCost->shippingCompany->name }}</td>
                        <td>
                            @foreach ($shippingCompanyCost->companyCostStates as $companyCostState)
                                {{ $companyCostState->state->name }} -
                            @endforeach
                        </td>
                        <td>{{ $shippingCompanyCost->price }}</td>
                        <td>{{ $shippingCompanyCost->refund_price }}</td>
                        <td>
                            @can('shipping-company-edit')
                                <a class="btn btn-primary" href="{{ route('admin.shipping-company-costs.edit',$shippingCompanyCost->id) }}">Edit</a>
                            @endcan

                            @can('shipping-company-delete')
                                <form method="POST" action="{{route('admin.shipping-company-costs.destroy',$shippingCompanyCost->id)}}"
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


            {!! $shippingCompanyCosts->render() !!}
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('/assets/scripts/map.js')}}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?v=3&libraries=places&key=AIzaSyDQiN4qc7pC9b1BRQwkqXXD28peMfWcHvw&callback=myMap"></script>
    <script src="{{asset('assets/select2/select2.min.js')}}"></script>

@endsection
