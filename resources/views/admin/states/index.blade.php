@extends('admin.layouts.app')

@section('header')

@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <div class="mr-3"><h2>{{__('messages.regions')}} Management</h2></div>
                <div class="my-lg-0 my-1">
                    @can('state-create')
                    <a href="{{ route('admin.states.create') }}"
                       class="btn btn-sm btn-info font-weight-bolder text-uppercase">Create New {{__('messages.regions')}}</a>
                    @endcan
                </div>
            </div>
            <br>

            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Country</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($states as $key => $state)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $state->name }}</td>
                        <td>{{ $state->country->name }}</td>
                        <td>
                            @can('state-edit')
                                <a class="btn btn-primary" href="{{ route('admin.states.edit',$state->id) }}">Edit</a>
                            @endcan
                            @can('state-delete')
                                <form method="POST" action="{{route('admin.states.destroy',$state->id)}}"
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


            {!! $states->render() !!}
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('/assets/scripts/map.js')}}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?v=3&libraries=places&key=AIzaSyDQiN4qc7pC9b1BRQwkqXXD28peMfWcHvw&callback=myMap"></script>
    <script src="{{asset('assets/select2/select2.min.js')}}"></script>

@endsection
