@extends('admin.layouts.app')

@section('header')
    <style>
        .statistic-card {
            box-shadow: 1px 2px 5px #565656;
            margin-bottom: 17px;
        }
    </style>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <div class="mr-3"><h2>{{__('messages.profit report')}}</h2></div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div
                        class="statistic-card d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                        <span class="symbol symbol-50 symbol-light-success mr-2">
                            <span class="symbol-label">
                                <span class="svg-icon svg-icon-xl svg-icon-success">
                                    <i class="fa-regular fa-user"></i>
                                </span>
                            </span>
                        </span>
                        <div class="d-flex flex-column text-right">
                            <span class="text-dark-75 font-weight-bolder font-size-h3">
                                {{App\Http\Helpers\GeneralHelper::priceCurrency($totalSales)}}
                            </span>
                            <span class="text-muted font-weight-bold mt-2">{{__('messages.total sales')}}</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <div
                        class="statistic-card d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                        <span class="symbol symbol-50 symbol-light-success mr-2">
                            <span class="symbol-label">
                                <span class="svg-icon svg-icon-xl svg-icon-success">
                                    <i class="fa-regular fa-user"></i>
                                </span>
                            </span>
                        </span>
                        <div class="d-flex flex-column text-right">
                            <span class="text-dark-75 font-weight-bolder font-size-h3">
                                {{ $totalOrders }}
                            </span>
                            <span class="text-muted font-weight-bold mt-2">{{__('messages.total orders')}}</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6">

                    <div
                        class="statistic-card d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                        <span class="symbol symbol-50 symbol-light-success mr-2">
                            <span class="symbol-label">
                                <span class="svg-icon svg-icon-xl svg-icon-success">
                                    <i class="fa-regular fa-user"></i>
                                </span>
                            </span>
                        </span>
                        <div class="d-flex flex-column text-right">
                            <span class="text-dark-75 font-weight-bolder font-size-h3">
                                {{App\Http\Helpers\GeneralHelper::priceCurrency($totalSalesCompleted) }}
                            </span>
                            <span
                                class="text-muted font-weight-bold mt-2">{{__('messages.total sales completed')}}</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6">

                    <div
                        class="statistic-card d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                        <span class="symbol symbol-50 symbol-light-success mr-2">
                            <span class="symbol-label">
                                <span class="svg-icon svg-icon-xl svg-icon-success">
                                    <i class="fa-regular fa-user"></i>
                                </span>
                            </span>
                        </span>
                        <div class="d-flex flex-column text-right">
                            <span class="text-dark-75 font-weight-bolder font-size-h3">
                                {{App\Http\Helpers\GeneralHelper::priceCurrency($totalSellerDeservedCompletedPrices) }}
                            </span>
                            <span
                                class="text-muted font-weight-bold mt-2">{{__('messages.total sales seller completed')}}</span>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-sm-6">

                    <div
                        class="statistic-card d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                        <span class="symbol symbol-50 symbol-light-success mr-2">
                            <span class="symbol-label">
                                <span class="svg-icon svg-icon-xl svg-icon-success">
                                    <i class="fa-regular fa-user"></i>
                                </span>
                            </span>
                        </span>
                        <div class="d-flex flex-column text-right">
                            <span class="text-dark-75 font-weight-bolder font-size-h3">
                                {{App\Http\Helpers\GeneralHelper::priceCurrency($totalShippingCompanyCompleted) }}
                            </span>
                            <span
                                class="text-muted font-weight-bold mt-2">{{__('messages.shipping companies cost completed')}}</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6">

                    <div
                        class="statistic-card d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                        <span class="symbol symbol-50 symbol-light-success mr-2">
                            <span class="symbol-label">
                                <span class="svg-icon svg-icon-xl svg-icon-success">
                                    <i class="fa-regular fa-user"></i>
                                </span>
                            </span>
                        </span>
                        <div class="d-flex flex-column text-right">
                            <span class="text-dark-75 font-weight-bolder font-size-h3">
                                {{App\Http\Helpers\GeneralHelper::priceCurrency($totalShippingCompanyRefund) }}
                            </span>
                            <span
                                class="text-muted font-weight-bold mt-2">{{__('messages.shipping companies cost refund')}}</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6">

                    <div
                        class="statistic-card d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                        <span class="symbol symbol-50 symbol-light-success mr-2">
                            <span class="symbol-label">
                                <span class="svg-icon svg-icon-xl svg-icon-success">
                                    <i class="fa-regular fa-user"></i>
                                </span>
                            </span>
                        </span>
                        <div class="d-flex flex-column text-right">
                            <span class="text-dark-75 font-weight-bolder font-size-h3">
                                {{App\Http\Helpers\GeneralHelper::priceCurrency($netProfit) }}
                            </span>
                            <span class="text-muted font-weight-bold mt-2">{{__('messages.net profit')}}</span>
                        </div>
                    </div>
                </div>

            </div>
            <br>

            <form method="GET" action="">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong>From Date:</strong>
                                <input type="date" value="{{request()->from_date}}" class="form-control"
                                       name="from_date">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <strong>To Date:</strong>
                                <input type="date" value="{{request()->to_date}}" class="form-control" name="to_date">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>

            <table class="table table-bordered">
                <tr>
                    <th>Order Number</th>
                    <th>Create Date</th>
                    <th>Last Update Date</th>
                    <th>Status</th>
                    <th>Total Order</th>
                    <th>Shipping</th>
                    <th>Shipping Company Cost</th>
                    <th>Shipping Profit</th>
                    <th>Profit Seller</th>
                    <th>Profit System</th>
                </tr>
                @php($companyCostTotal =0)
                @php($sellerDeservedTotal =0)
                @php($systemProfitTotal =0)

                @foreach ($orders as $key => $order)
                    <tr>
                        @php($companyCost =0)
                        @php($sellerDeserved =0)
                        @php($systemProfit =0)
                        @php($orderState =null)
                        <td>
                            <a target="_blank"
                               href="{{route('admin.orders.show',[$order->ID])}}"
                               class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                {{ $order->ID }}
                            </a>
                        </td>
                        <td>{{$order->post_date?\Carbon\Carbon::parse($order->post_date)->format('Y-m-d'):''}}</td>
                        <td>{{$order->statusHistories()->orderBy('id','desc')->first()?->created_at?->format('Y-m-d')}}</td>
                        <td>
                            <span class="badge fs-7 status-{{$order->orderStatus->status}}">
                                {{$order->orderStatus->status}}
                            </span>
                        </td>
                        <td>
                            {{$order->postMetaTotalPrice->meta_value}}
                        </td>
                        <td>
                            {{ $order->postShippingPrice->meta_value }}
                        </td>

                        <td>
                            @if ($order->orderStatus->status == 'wc-refunded')
                                @php($companyCost = $order->shipping_company_cost_refund_price??0)
                            @else
                                @php($companyCost = $order->shipping_company_cost_price??0)
                            @endif
                            {{$companyCost}}
                        </td>
                        <td>
                            @php($companyCostProfit = $order->postShippingPrice->meta_value - $companyCost)

                            {{ $companyCostProfit }}
                        </td>
                        <td>

                            @foreach($order->orderItems as $orderItem)
                                @foreach($orderItem->productOrderItems as $productOrderItems)
                                    @php($sellerDeserved += $productOrderItems->product->sellerDeserved->meta_value??0)

                                @endforeach
                            @endforeach
                            @if ($order->orderStatus->status == 'wc-refunded')
                                0
                            @else
                                {{ $sellerDeserved }}
                            @endif
                        </td>
                        <td>
                            @php($systemProfit = $order->postMetaTotalPrice->meta_value - $companyCost - $sellerDeserved)
                            @if ($order->orderStatus->status == 'wc-refunded')
                                0
                            @else
                                {{$systemProfit}}
                            @endif
                        </td>

                    </tr>

                    @if ($order->orderStatus->status == 'wc-refunded')
                        @php($systemProfitTotal += $companyCostProfit)
                    @endif

                    @if ($order->orderStatus->status != 'wc-refunded')

                        @php($sellerDeservedTotal += $sellerDeserved)
                        @php($systemProfitTotal += $systemProfit)
                    @endif

                    @php($companyCostTotal += $companyCostProfit)


                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{__('messages.total')}} : {{$companyCostTotal}}</td>
                    <td>{{__('messages.total')}} : {{$sellerDeservedTotal}}</td>
                    <td>{{__('messages.total')}} : {{$systemProfitTotal}}</td>
                </tr>
            </table>

            {{$orders->links()}}
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('/assets/scripts/map.js')}}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?v=3&libraries=places&key=AIzaSyDQiN4qc7pC9b1BRQwkqXXD28peMfWcHvw&callback=myMap"></script>
    <script src="{{asset('assets/select2/select2.min.js')}}"></script>

@endsection
