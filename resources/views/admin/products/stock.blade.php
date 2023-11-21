@extends('admin.layouts.app')

@section('header')
@endsection

@section('content')

    <div class="card card-custom gutter-b">
        <div class="card-header pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold text-gray-800">{{__('messages.stock')}}</span>
            </h3>
            <div class="my-lg-0 my-1">
                <a class="btn btn-primary" href="{{ route('admin.products.index') }}"> Back</a>
            </div>
        </div>
        <div class="card-body p-0">
            <form action="{{route('admin.products.stock.update')}}" method="post">
                @csrf
                <input type="hidden" name="main_product_id" value="{{$product->ID}}">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="pl-0 font-weight-bold text-muted text-uppercase">{{__('messages.name')}}</th>
                        <th class="font-weight-bold text-muted text-uppercase">{{__('messages.quantity')}}</th>
                        <th class="font-weight-bold text-muted text-uppercase">{{__('messages.stock')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($product->variations as $variation)
                        <tr>
                            <td>{{$variation->post_title}}</td>
                            <td>
                                <input type="hidden" name="product_meta_id[]"
                                       value="{{$variation->productMeta->product_id}}">
                                <input name="quantity[]" type="number" class="form-control"
                                       value="0">
                            </td>
                            <td>{{$variation->productMeta->stock_quantity??0}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td>{{$product->post_title}}</td>
                            <td>
                                <input type="hidden" name="product_meta_id[]"
                                       value="{{$product->productMeta->product_id}}">
                                <input name="quantity[]" type="number" class="form-control"
                                       value="0">
                            </td>
                            <td>{{$product->productMeta->stock_quantity??0}}</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

                <div class="form-group text-center">
                    <button class="btn btn-primary pull-right" type="submit">{{__('messages.submit')}}</button>
                </div>

            </form>
        </div>
    </div>

    <div class="card card-custom gutter-b">
        <div class="card-header pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold text-gray-800">{{__('messages.stock history')}}</span>
            </h3>
        </div>

        <div class="card-body p-0">
            <table class="table">
                <thead>
                <tr>
                    <th class="pl-0 font-weight-bold text-muted text-uppercase">{{__('messages.name')}}</th>
                    <th class="font-weight-bold text-muted text-uppercase">{{__('messages.quantity')}}</th>
                    <th class="font-weight-bold text-muted text-uppercase">{{__('messages.date')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($stockHistories as $stockHistory)
                    <tr>
                        <td>{{ $stockHistory->product->post_title }}</td>
                        <td>
                            {{ $stockHistory->quantity??0 }}
                        </td>
                        <td>
                            {{ $stockHistory->created_at?->format('Y-m-d') }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <br>
            <br>
        </div>
    </div>


@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('/assets/scripts/map.js')}}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?v=3&libraries=places&key=AIzaSyDQiN4qc7pC9b1BRQwkqXXD28peMfWcHvw&callback=myMap"></script>
    <script src="{{asset('assets/select2/select2.min.js')}}"></script>

@endsection
