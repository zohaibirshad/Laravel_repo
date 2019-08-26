    @extends('layout.dashboard')
    @section('content')
    
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="container-fluid">
            <h1>Add New Permission</h1>
            <!-- Content Row -->
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-7 customemargin">
                    <div class="p-5">
                        <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4"></h1>
                        </div>
                        <form class="user" method="POST" action="{{url('admin/permission/add')}}">
                        @CSRF
                            <input type="text" class="form-control form-control-user" name="name" placeholder="Name">
                        <input type="hidden" name="user_email" value="{{Auth::user()->email}}">
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