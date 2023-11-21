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
                    <th>{{__('messages.id')}}</th>
                    <th>{{__('messages.name')}}</th>
                    @foreach(App\Models\OrderStatus::$types as $type)
                        <th>{{$type}}</th>
                    @endforeach
                </tr>

                </thead>
                <tbody>

                @foreach($products as $key => $product)
                    <tr>
                        <th>{{$product->ID}}</th>
                        <th>{{$product->post_title}}</th>
                        @foreach(App\Models\OrderStatus::$types as $typeKey => $type)
                            <th>
                                @php($productOrderItem = App\Models\ProductOrderItem::where('product_id',$product->ID)
                                    ->whereHas('orderStatus' , function ($q) use ($typeKey){
                                        $q->where('status',$typeKey);
                                    })->get())
                                {{!empty($productOrderItem)?$productOrderItem->sum('product_qty'):''}}
                            </th>
                        @endforeach
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
