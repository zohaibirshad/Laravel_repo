@extends('layout.dashboard')
@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif
@if(session('failed'))
<div class="alert alert-danger">
        {{session('failed')}}
    </div>
@endif
<!-- Begin Page Content -->
<div class="container-fluid">

    <h1>Permissions</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Permissions</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Added by User(Email)</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tbody>
                            @foreach ($permissions as $permission)

                            <tr>
                                <td>{{ $permission->name }}</td>
                                <td>{{  $permission->user_email}}</td>
                                <td>
                                    <a href="{{url('admin/delete/permission/'.$permission->permissionslug)}}"> <img title="delete"
                                            src="{{ asset('storage/icons/delete-icon.jpg') }}" alt=""
                                            class="action-icon"></a>
                                    {{-- <a href="{{url('admin/edit/permission/'.$permission->permissionslug)}}" > <img title="edit"
                                            src="{{ asset('storage/icons/edit_icon.png') }}" alt=""
                                            class="action-icon"></a> --}}
                                    <a href="{{url('admin/view/permission/'.$permission->permissionslug)}}"> <img title="view"
                                            src="{{ asset('storage/icons/view-icon-png-13.jpg') }}" alt=""
                                            class="action-icon"></a>
                                </td>
                            </tr>
                            @endforeach
                            {{ $permissions->links() }}
                        </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
