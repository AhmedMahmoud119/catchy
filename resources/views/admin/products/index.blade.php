@extends('admin.layouts.app')

@section('header')

@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-header pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-gray-800">{{__('messages.products')}}</span>
                </h3>

            </div>
            <table class="table table-bordered table-responsive" id="kt_datatable">
                <thead>

                <tr>
                    <th>#</th>
                    <th>{{__('messages.image')}}</th>
                    <th>{{__('messages.name')}}</th>
                    <th>{{__('messages.status')}}</th>
                    <th>{{__('messages.price')}}</th>
                    <th>{{__('messages.stock status')}}</th>
                    <th>{{__('messages.action')}}</th>

                </tr>

                </thead>
                <tbody>

                @foreach($products as $key => $product)
                    <tr>
                        <th>{{$key + 1}}</th>
                        <td><img width="100" height="70" src="{{App\Http\Helpers\ProductHelper::image($product->ID)->guid??''}}"></td>
                        <td>{{$product->post_title}}</td>
                        <td>{{$product->post_status}}</td>
                        <td>{{$product->price->meta_value??''}}</td>
                        <td>{{$product->productMeta->stock_status??''}}</td>
                        <td>
                            @can('update-stock')
                                <a class="btn btn-primary" href="{{route('admin.products.stock',$product->ID)}}">
                                    {{__('messages.stock')}}
                                </a>
                            @endcan
                            @can('update-price')
                                <a class="btn btn-success" href="{{route('admin.products.price',$product->ID)}}">
                                    {{__('messages.price')}}
                                </a>
                            @endcan
                        </td>

                    </tr>
                @endforeach

                </tbody>
            </table>

        {{$products->links()}}
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
