@extends('admin.layouts.app')

@section('header')

@endsection

@section('content')
        <div class="card">
            <div class="card-header pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-gray-800">{{__('messages.orders')}}</span>
                </h3>

            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <form method="GET" action="{{route('admin.orders.index',request()->type)}}">
                    @csrf

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-3">
                            <div class="form-group">
                                <strong>From Date:</strong>
                                <input value="{{request()->from_date}}" type="date" class="form-control" name="from_date">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-3">
                            <div class="form-group">
                                <strong>To Date:</strong>
                                <input value="{{request()->to_date}}" type="date" class="form-control" name="to_date">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-3">
                            <div class="form-group">
                                <strong>Source:</strong>
                                <select class="form-control" id="source" name="source">
                                    @foreach(\App\Models\OrderStatus::$sources as $key => $source)
                                        <option
                                            {{$source == request()->source ? 'selected':''}}
                                            value="{{$source}}">{{ $source }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                </form>


                <table class="table table-bordered table-checkable table-responsive" id="kt_datatable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Source</th>
                        <th>Order Date</th>
                        <th>Last Update Date</th>
                        <th>Payment Method</th>
                        <th>Paid</th>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Phone</th>
{{--                        <th>Address</th>--}}
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $key=> $order)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$order->postMetaShippingFirstName->meta_value??''}} {{$order->postMetaShippingLastName->meta_value??''}}</td>
                            <td>{{$order->source}}</td>
                            <td>{{$order->post_date->format('Y-m-d')}}</td>
                            <td>{{$order->statusHistories()->orderBy('id','desc')->first()?->created_at?->format('Y-m-d')}}</td>
                            <td>{{$order->postPaymentMethod->meta_value}}</td>
                            <td>{!! $order->orderStatus->date_paid?'<span class="badge fs-7 badge-success">Paid</span>':'<span class="badge fs-7 badge-danger">Unpaid</span>' !!}</td>
                            <td>
                                @foreach($order->orderItems as $orderItem)
                                    @foreach($orderItem->productOrderItems as $productOrderItem)
                                        {{$orderItem->order_item_name}} ( {{$productOrderItem->product_qty}} ) <br>
                                    @endforeach
                                @endforeach
                            </td>

                            <td>
                                {{App\Http\Helpers\GeneralHelper::priceCurrency($order->orderStatus->total_sales,$order->postMetaCurrency->meta_value)}}
                            </td>

                            <td>
                                <span class="badge fs-7 status-{{$order->orderStatus->status}}">{{\App\Models\OrderStatus::$types[$order->orderStatus->status]}}</span>
                            </td>

                            <td>
                                {{$order->postMetaBillingPhone->meta_value}}
                            </td>

{{--                            <td>--}}
{{--                                {{$order->postMetaShippingAddressOne->meta_value}}--}}
{{--                            </td>--}}

                            <td>
                                <a href="{{route('admin.orders.show',[$order->ID])}}" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                    <span class="svg-icon svg-icon-md svg-icon-primary">
                                        <i class="fa-regular fa-eye"></i>
                                    </span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{$orders->links()}}
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
