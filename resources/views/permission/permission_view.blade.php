@extends('layout.dashboard')
@section('content')
<div class="jumbotron">
    <h3>Permission Data</h3>
    <table class="table table_striped">
        <tr>
            <td>
                <label for="id_label">Permission Id</label>
            </td>
            <td>
                <label for="id">{{$permissions[0]->id}}</label>
            </td>
        </tr>
        <tr>

            <td>
                <label for="name_label">Permission Name</label>
            </td>
            <td>
                <label for="name">{{ $permissions[0]->name}}</label>
            </td>
        </tr>
        <tr>

            <td>
                <label for="email_label">Permission Added By</label>
            </td>
            <td>

                @if($permissions[0]->user_email!=Null)
                <label for="user_email">{{$permissions[0]->user_email}}</label>
                @else
                <label for="user_email">No email found</label>
                @endif
            </td>
        </tr>

        <table>
</div>
@endsection
