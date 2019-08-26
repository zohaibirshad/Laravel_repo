
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

@extends('layout.dashboard')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <h1>Users</h1>
@if($message=session('success'))
<div class="alert alert-success">
    {{ $message }}
</div>
@endif
@if($message=session('failed'))
<div class="alert alert-danger">
        {{ $message }}
    </div>
@endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Registerd Users</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actios</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tbody>
                            @foreach ($userData as $user)

                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{  $user->email }}</td>
                                <td>
                                    <a href="{{ url('/admin/delete/user/'.$user->id) }}"> <img title="Edit" src="{{ asset('storage/icons/delete-icon.jpg') }}"
                                            alt="" class="action-icon"></a>
                                    <a href="{{ url('/admin/edit/user/'.$user->id) }}"> <img title="view"
                                            src="{{ asset('storage/icons/edit_icon.png') }}" alt=""
                                            class="action-icon"></a>
                                    <a href="{{ url('/admin/view/user/'.$user->id) }}"> <img title="Delete"
                                            src="{{ asset('storage/icons/view-icon-png-13.jpg') }}" alt=""
                                            class="action-icon"></a>
                                </td>
                            </tr>
                            @endforeach
                            {{ $userData->links() }}
                        </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection

<script>
        function ReplaceContent(NC) {
            document.open();
            document.write(NC);
            document.close();
          }
        $(document).ready(function(){
            $(document).on('click', '.pagination a', function(event){
             event.preventDefault();
             var page = $(this).attr('href').split('page=')[1];

             fetch_data(page);
            });

            function fetch_data(page)
{
$.ajax({
url:"list?page="+page,
success:function(data)
{
ReplaceContent(data);
}
});
}

});

</script>

