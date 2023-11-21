@extends('admin.layouts.app')

@section('header')

@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <div class="mr-3"><h2>Admin Management</h2></div>
                <div class="my-lg-0 my-1">
                    @can('admin-create')
                        <a href="{{ route('admin.admins.create') }}"
                           class="btn btn-sm btn-info font-weight-bolder text-uppercase">Create New Admin</a>
                    @endcan
                </div>
            </div>
            <br>
            <table class="table table-bordered table-checkable" id="kt_datatable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('messages.name')}}</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($admins as $key=> $admin)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$admin->name}}</td>
                        <td>{{$admin->email}}</td>
                        <td>
                            @foreach($admin->roles as $role)
                                {{$role->name}}
                            @endforeach
                        </td>
                        <td>
                            @can('admin-edit')
                                <a class="btn btn-primary" href="{{ route('admin.admins.edit',$admin->id) }}">Edit</a>
                            @endcan
                            @can('admin-delete')
                                <form method="POST" action="{{route('admin.admins.destroy',$admin->id)}}"
                                      style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">{{__('messages.delete')}}</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{$admins->links()}}
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
