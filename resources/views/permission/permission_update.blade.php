@extends('layout.dashboard')
@section('content')

<div class="container-fluid">
        <h1>Permission Updation</h1>
        <!-- Content Row -->
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-7 customemargin">
                <div class="p-5">
                    <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"></h1>
                    </div>
                    <form action="{{url('admin/update/permission/'.$permissions[0]->permissionslug)}}" method="POST">
                    @CSRF
                        <input type="text" class="form-control form-control-user" name="name" placeholder="Name" value="{{$permissions[0]->name}}" required>
                    {{-- <input type="hidden" name="user_email" value="{{Auth::user()->email}}"> --}}
                    </div>
                    
                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Update">

                    <hr>

                    </form>
                    <hr>
                    </div>
                </div>
            </div>
            </div>
        </div>
@endsection