@extends('layout.dashboard')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <h1>Update User Information</h1>
    <!-- Content Row -->
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4"></h1>
                        </div>
                        @include('user.messages')
                        @if ($errors->any())


                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form class="user" method="post" action="{{url('/admin/update/user/'.$userData[0]->id)}} ">
                            @csrf
                            @php
                            @endphp
                    <input type="hidden" name="id" value="{{ $userData[0]->id }}">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user"
                                    value="{{ $userData[0]->name }}" name="name" placeholder="Name">

                            </div>
                            <div class="form-group">
                                <input type="email" name="email" value="{{  $userData[0]->email }}"
                                    class="form-control form-control-user" placeholder="Email Address">
                            </div>
                            <div class="form-group row">
                                <div style="padding:20px">
                                    {{--  Permissions  --}}

                                    <select class="selectpicker" data-live-search="true" name="permission[]" multiple>

                                        @php
                                        $x=0;
                                        @endphp
                                        @foreach($permissionsData as $p)

                                        <option value="{{ $p->id }}" @if(in_array($p->
                                            id,$permissions_user))selected="selected"@endif >
                                            {{ $p->name }}
                                        </option>
                                        @endforeach
                                </div>
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
    <!-- End of Main Content -->
    @endsection
