@extends('admin.layouts.app')

@section('header')
    <style>

        /* common */
        .ribbon {
            width: 150px;
            height: 150px;
            overflow: hidden;
            position: absolute;
        }

        .ribbon::before,
        .ribbon::after {
            position: absolute;
            z-index: -1;
            content: '';
            display: block;
        }

        .ribbon span {
            position: absolute;
            display: block;
            width: 225px;
            padding: 15px 0;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
            color: #fff;
            font: 700 18px/1 'Lato', sans-serif;
            text-shadow: 0 1px 1px rgba(0, 0, 0, .2);
            text-transform: uppercase;
            text-align: center;
        }

        /* top left*/
        .ribbon-top-left {
            top: -10px;
            left: -10px;
        }

        .ribbon-top-left::before,
        .ribbon-top-left::after {
            border-top-color: transparent;
            border-left-color: transparent;
        }

        .ribbon-top-left::before {
            top: 0;
            right: 0;
        }

        .ribbon-top-left::after {
            bottom: 0;
            left: 0;
        }

        .ribbon-top-left span {
            right: -25px;
            top: 30px;
            transform: rotate(-45deg);
        }

        /* top right*/
        .ribbon-top-right {
            top: -10px;
            right: -10px;
        }

        .ribbon-top-right::before,
        .ribbon-top-right::after {
            border-top-color: transparent;
            border-right-color: transparent;
        }

        .ribbon-top-right::before {
            top: 0;
            left: 0;
        }

        .ribbon-top-right::after {
            bottom: 0;
            right: 0;
        }

        .ribbon-top-right span {
            left: -25px;
            top: 30px;
            transform: rotate(45deg);
        }

        /* bottom left*/
        .ribbon-bottom-left {
            bottom: -10px;
            left: -10px;
        }

        .ribbon-bottom-left::before,
        .ribbon-bottom-left::after {
            border-bottom-color: transparent;
            border-left-color: transparent;
        }

        .ribbon-bottom-left::before {
            bottom: 0;
            right: 0;
        }

        .ribbon-bottom-left::after {
            top: 0;
            left: 0;
        }

        .ribbon-bottom-left span {
            right: -25px;
            bottom: 30px;
            transform: rotate(225deg);
        }

        /* bottom right*/
        .ribbon-bottom-right {
            bottom: -10px;
            right: -10px;
        }

        .ribbon-bottom-right::before,
        .ribbon-bottom-right::after {
            border-bottom-color: transparent;
            border-right-color: transparent;
        }

        .ribbon-bottom-right::before {
            bottom: 0;
            left: 0;
        }

        .ribbon-bottom-right::after {
            top: 0;
            right: 0;
        }

        .ribbon-bottom-right span {
            left: -25px;
            bottom: 30px;
            transform: rotate(-225deg);
        }
    </style>
@endsection

@section('content')

    <div class="card card-custom gutter-b">
        <div class="card-body p-0">

{{--            <div class="row">--}}
{{--                <div class="col-12">--}}

                    <div class="ribbon ribbon-top-right"><span class="status-{{$order->orderStatus->status}}">
                    {{\App\Models\OrderStatus::$types[$order->orderStatus->status]??''}}
                </span></div>

                    <div class="row justify-content-center py-8 px-8 py-md-27 px-md-0">
                        <div class="col-md-10">
                            <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                                <h1 class="display-4 font-weight-boldest mb-10">ORDER DETAILS</h1>
                                <div class="d-flex flex-column align-items-md-end px-0">
                                    <select class="form-control" id="status" name="status">
                                        @foreach(\App\Models\OrderStatus::$types as $key => $type)
                                            <option
                                                {{$key == $order->orderStatus->status?'selected':''}} value="{{$key}}">{{ $type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="d-flex flex-column align-items-md-end px-0">
                                    <select class="form-control" id="source" name="source">
                                        @foreach(\App\Models\OrderStatus::$sources as $key => $source)
                                            <option
                                                {{$source == $order->source ? 'selected':''}}
                                                value="{{$source}}">{{ $source }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="d-flex flex-column align-items-md-end px-0">
                                    <select class="form-control" id="payment_status" name="payment_status">
                                        <option
                                            {{$order->orderStatus->date_paid?'selected':''}}
                                            value="1">Paid</option>
                                        <option
                                            {{$order->orderStatus->date_paid == null?'selected':''}}
                                            value="0">Un Paid</option>
                                    </select>
                                </div>
                            </div>
                            <div class="border-bottom w-100"></div>
                            <div class="d-flex justify-content-between pt-6">
                                <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Name : {{$order->postMetaShippingFirstName->meta_value??''}} {{$order->postMetaShippingLastName->meta_value??''}}</span>
                                    <span class="font-weight-bolder mb-2">
                                        Phone : {{$order->postMetaBillingPhone->meta_value}}
                                    </span>
                                    @if ($order->shippingCompany)
                                        <span class="font-weight-bolder mb-2">
                                            Shipping Company : {{$order->shippingCompany->name??''}}
                                        </span>
                                        <span class="font-weight-bolder mb-2">
                                            Shipping {{__('messages.region')}} : {{App\Models\State::find($order->postMetaShippingStateId->meta_value)->name??''}}
                                        </span>
                                    @endif
                                </div>
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">ORDER DATE</span>
                                    <span class="opacity-70">
                                        {{$order->post_date?\Carbon\Carbon::parse($order->post_date)->format('Y-m-d'):''}}
                                    </span>
                                </div>
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">ORDER NO.</span>
                                    <span class="opacity-70">{{$order->ID}}</span>

                                    <span class="font-weight-bolder mb-2">Payment Method.</span>
                                    <span class="opacity-70">{{$order->postPaymentMethod->meta_value}}</span>

                                    <span class="font-weight-bolder mb-2">Payment Date.</span>
                                    <span class="opacity-70">
                                        {{$order->orderStatus->date_paid?\Carbon\Carbon::parse($order->orderStatus->date_paid)->format('Y-m-d'):''}}
                                    </span>

                                </div>
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">Address.</span>
                                    <span class="opacity-70">{{$order->postMetaShippingAddressOne->meta_value}}</span>
                                    <span
                                        class="opacity-70">{{$order->postMetaShippingAddressTwo->meta_value??''}}</span>
                                    <span
                                        class="opacity-70">City:{{$order->postMetaShippingCity->meta_value??''}}</span>
                                    <span
                                        class="opacity-70">{{__('messages.region')}}:{{$order->postMetaShippingState->meta_value??''}}</span>
                                </div>
                                <div class="d-flex flex-column flex-root">
                                    <div class="border-0 pt-5">
                                        <h3 class="card-title align-items-start flex-column">
                                                <span
                                                    class="card-label fw-bold text-dark">{{__('messages.status history')}}</span>
                                        </h3>
                                    </div>
                                    <div class="pt-5">
                                        @foreach($order->statusHistories as $statusHistory)
                                            <div class="">
                                    <span class="badge fs-7 status-{{$statusHistory->status}}">
                                        {{\App\Models\OrderStatus::$types[$statusHistory->status]}}
                                    </span>
                                                <span class="badge fs-7">
                                        {{$statusHistory->created_at?->format('Y-m-d')}}
                                    </span>
                                            </div>
                                            <br>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end: Invoice header-->
                    <!-- begin: Invoice body-->
                    <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                        <div class="col-md-10">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="pl-0 font-weight-bold text-muted text-uppercase">Ordered Items</th>
                                        <th class="text-right font-weight-bold text-muted text-uppercase">Qty</th>
                                        <th class="text-right font-weight-bold text-muted text-uppercase">Unit Price</th>
                                        <th class="text-right pr-0 font-weight-bold text-muted text-uppercase">Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order->orderItems as $orderItem)
                                        @foreach($orderItem->productOrderItems as $productOrderItem)

                                            <tr class="font-weight-boldest">
                                                <td class="border-0 pl-0 pt-7 d-flex align-items-center">
                                                    <!--begin::Symbol-->
                                                    <a href="{{route('admin.products.price',$productOrderItem->product_id)}}">
                                                        <div class="symbol symbol-40 flex-shrink-0 mr-4 bg-light">
                                                            <div class="symbol-label" style="background-image:
                                                                url('{{App\Http\Helpers\ProductHelper::image($productOrderItem->product_id)->guid??''}}')"></div>
                                                        </div>
                                                        <!--end::Symbol-->
                                                        {{$orderItem->order_item_name}}
                                                    </a>

                                                </td>

                                                <td class="text-right pt-7 align-middle">{{$productOrderItem->product_qty}}</td>
                                                <td class="text-right pt-7 align-middle">
                                                    {{App\Http\Helpers\GeneralHelper::priceCurrency($productOrderItem->product_net_revenue/$productOrderItem->product_qty,$order->postMetaCurrency->meta_value)}}
                                                </td>
                                                <td class="text-primary pr-0 pt-7 text-right align-middle">
                                                    {{App\Http\Helpers\GeneralHelper::priceCurrency($productOrderItem->product_net_revenue,$order->postMetaCurrency->meta_value)}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end: Invoice body-->
{{--                </div>--}}
{{--            </div>--}}
            <!-- begin: Invoice footer-->
            <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0 mx-0">
                <div class="col-md-10">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="font-weight-bold text-muted text-uppercase"></th>
                                <th class="font-weight-bold text-muted text-uppercase"></th>
                                <th class="font-weight-bold text-muted text-uppercase text-right">TOTAL PAID</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="font-weight-bolder">
                                <td></td>
                                <td></td>
                                <td class="text-primary font-size-h3 font-weight-boldest text-right">
                                    {{App\Http\Helpers\GeneralHelper::priceCurrency($order->orderStatus->total_sales,$order->postMetaCurrency->meta_value)}}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end: Invoice footer-->
            <!-- begin: Invoice action-->
            <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                <div class="col-md-10">
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-light-primary font-weight-bold" onclick="window.print();">
                            Download Order Details
                        </button>
                        <button type="button" class="btn btn-primary print_order font-weight-bold">Print
                            Order Details
                        </button>
                    </div>
                </div>
            </div>
            <!-- end: Invoice action-->
            <!-- end: Invoice-->
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Shipping Company</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.orders.update-status',$order->ID)}}" method="POST">
                    @csrf

                    <div class="modal-body">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <input type="hidden" name="status" value="wc-in-shipping">
                            <div class="form-group">
                                <strong>Shipping Company:</strong>
                                <select required name="shipping_company_id" class="form-control">
                                    <option value="">{{__('messages.select')}}</option>
                                    @foreach(\App\Models\ShippingCompany::get() as $shippingCompany)
                                        <option {{$shippingCompany->shipping_company_id == $shippingCompany->id ? 'selected':''}} value="{{$shippingCompany->id}}">{{$shippingCompany->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>{{__('messages.regions')}}:</strong>
                                <select required name="state_id" class="form-control">
                                    <option value="">{{__('messages.select')}}</option>
                                    @foreach(\App\Models\State::get() as $state)
                                        <option {{$order->postMetaShippingStateId?->meta_value == $state->id?'selected':''}}
                                                value="{{$state->id}}">{{$state->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('/assets/scripts/map.js')}}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?v=3&libraries=places&key=AIzaSyDQiN4qc7pC9b1BRQwkqXXD28peMfWcHvw&callback=myMap"></script>
    <script src="{{asset('assets/select2/select2.min.js')}}"></script>

    <script>
        $('#status').on('change', function () {
            var status = $(this).val();

            if (status == 'wc-in-shipping'){
                $('.modal').modal('toggle');
                return ;
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('admin.orders.update-status',$order->ID)}}",
                method: "post",
                data: {
                    status: status
                },
                success: function (result) {
                    location.reload();
                }
            });

        });

        $('#source').on('change', function () {
            var source = $(this).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('admin.orders.update-source',$order->ID)}}",
                method: "post",
                data: {
                    source: source
                },
                success: function (result) {
                    location.reload();
                }
            });

        });

        $('#payment_status').on('change', function () {
            var payment_status = $(this).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('admin.orders.update-payment-status',$order->ID)}}",
                method: "post",
                data: {
                    payment_status: payment_status
                },
                success: function (result) {
                    location.reload();
                }
            });

        });
    </script>

    <script>

        $('.print_order').on('click',function (){

            $.ajax({
                type: 'POST',
                url: "{{route('admin.orders.print')}}",
                dataType: 'html',
                data: {order_ids:"{{ $order->ID }}"},
                success: function (html) {
                    w = window.open(window.location.href,"_blank");
                    w.document.open();
                    w.document.write(html);
                    w.document.close();
                    w.window.print();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });

        });


    </script>
@endsection
