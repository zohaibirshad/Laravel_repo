@extends('layout.dashboard')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Activity Logs</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-custome" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        {{-- <th>Actions</th> --}}
                        <th>Methods</th>
                        <th>Urls</th>
                        <th>Browser</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tfoot>
                    <tbody>
                        @foreach ($activitylogs as $activity)

                        <tr>

                            <td>{{$activity->id}}</td>
                            <td>{{ $activity->username }}</td>
                            <td>{{  $activity->email }}</td>
                            {{-- <td>{{$activity->action}}</td> --}}
                        <td>{{$activity->method}}</td>
                        <td>{{$activity->url}}</td>
                        <td>{{$activity->browser}}</td>
                        <td>{{date('d-m-Y', strtotime($activity->created_at))}}</td>
                        </tr>
                        @endforeach
                        {{ $activitylogs->links() }}
                    </tbody>
            </table>
        </div>
    </div>
</div>
@endsection