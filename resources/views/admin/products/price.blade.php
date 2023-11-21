@extends('admin.layouts.app')

@section('header')
@endsection

@section('content')

    <div class="card card-custom gutter-b">
        <div class="card-header pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold text-gray-800">{{__('messages.price')}}</span>
            </h3>
            <div class="my-lg-0 my-1">
                <a class="btn btn-primary" href="{{ route('admin.products.index') }}"> Back</a>
            </div>
        </div>
        <div class="card-body p-0">
            <form action="{{route('admin.products.price.update')}}" method="post">
                @csrf
                <input type="hidden" name="main_product_id" value="{{$product->ID}}">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="pl-0 font-weight-bold text-muted text-uppercase">{{__('messages.name')}}</th>
                        <th class="font-weight-bold text-muted text-uppercase">{{__('messages.seller deserved')}}</th>
                        <th class="font-weight-bold text-muted text-uppercase">{{__('messages.new price')}}</th>
                        <th class="font-weight-bold text-muted text-uppercase">{{__('messages.price')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($product->variations as $variation)
                        <input type="hidden" name="post_id[]"
                               value="{{$variation->ID}}">
                        <tr>
                            <td>{{$variation->post_title}}</td>
                            <td>
                                <input type="hidden" name="seller_deserved_meta_id[]"
                                       value="{{$variation->sellerDeserved->meta_id??0}}">
                                <input name="seller_deserved[]" type="number" class="form-control"
                                       value="{{$variation->sellerDeserved->meta_value??0}}">
                            </td>
                            <td>
                                <input type="hidden" name="price_meta_id[]"
                                       value="{{$variation->price->meta_id}}">
                                <input name="price[]" type="number" class="form-control"
                                       value="{{$variation->price->meta_value??0}}">
                            </td>
                            <td>{{$variation->price->meta_value??0}}</td>
                        </tr>
                    @empty
                        <input type="hidden" name="post_id[]"
                               value="{{$product->ID}}">
                        <tr>
                            <td>{{$product->post_title}}</td>
                            <td>
                                <input type="hidden" name="seller_deserved_meta_id[]"
                                       value="{{$product->sellerDeserved->meta_id??0}}">
                                <input name="seller_deserved[]" type="number" class="form-control"
                                       value="{{$product->sellerDeserved->meta_value??0}}">
                            </td>
                            <td>
                                <input type="hidden" name="price_meta_id[]"
                                       value="{{$product->price->meta_id}}">
                                <input name="price[]" type="number" class="form-control"
                                       value="{{$product->price->meta_value??0}}">
                            </td>
                            <td>{{$product->price->meta_value??0}}</td>
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


@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('/assets/scripts/map.js')}}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?v=3&libraries=places&key=AIzaSyDQiN4qc7pC9b1BRQwkqXXD28peMfWcHvw&callback=myMap"></script>
    <script src="{{asset('assets/select2/select2.min.js')}}"></script>

@endsection
