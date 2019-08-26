@extends('layout.dashboard')
@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">
        <h1>Add User</h1>
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
                    <form class="user" method="post" action="{{ url('admin/create/user') }}">
                        @csrf
                        <div class="form-group">
                          <input type="text" class="form-control form-control-user" name="name"  placeholder="Name">
                      </div>
                      <div class="form-group">
                        <input type="email" name="email" class="form-control form-control-user"  placeholder="Email Address">
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <input type="password" name="password" class="form-control form-control-user"  placeholder="Password">
                        </div>
                        <div class="col-sm-6">
                          <input type="password" name="password_confirmation" class="form-control form-control-user"  placeholder="Repeat Password">
                        </div>


                        <div style="padding:20px">
                            Permissions
                            <select class="selectpicker"  data-live-search="true" name="permission[]" multiple>
                            @foreach ($permissionsData as $permissions)
                            
                            <option value="{{ $permissions->id }}" >{{ $permissions->name }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                      <input type="submit" class="btn btn-primary btn-user btn-block">

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
 