@extends('admin.layouts.app')

@section('header')

@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <div class="mr-3"><h2>Role Management</h2></div>
                <div class="my-lg-0 my-1">
                    @can('role-create')
                    <a href="{{ route('admin.roles.create') }}"
                       class="btn btn-sm btn-info font-weight-bolder text-uppercase">Create New Role</a>
                    @endcan
                </div>
            </div>
            <br>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            @can('role-edit')
                                <a class="btn btn-primary" href="{{ route('admin.roles.edit',$role->id) }}">Edit</a>
                            @endcan
                            @can('role-delete')
                                {{--                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}--}}
                                <form method="POST" action="{{route('admin.roles.destroy',$role->id)}}"
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


            {!! $roles->render() !!}
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('/assets/scripts/map.js')}}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?v=3&libraries=places&key=AIzaSyDQiN4qc7pC9b1BRQwkqXXD28peMfWcHvw&callback=myMap"></script>
    <script src="{{asset('assets/select2/select2.min.js')}}"></script>

@endsection
