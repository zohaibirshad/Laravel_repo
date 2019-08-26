@extends('layout.dashboard')
@section('content')
<div class="jumbotron">
    <h3>User Profile</h3>
    <table class="table table_striped">
        <tr>
            <td>
                <label for="id_label">User Id</label>
            </td>
            <td>
                <label for="id">{{$users->id}}</label>
            </td>
        </tr>
        <tr>

            <td>
                <label for="name_label">User Name</label>
            </td>
            <td>
                <label for="name">{{$users->name}}</label>
            </td>
        </tr>
        <tr>

            <td>
                <label for="email_label">User Email</label>
            </td>
            <td>
                <label for="user_email">{{$users->email}}</label>
            </td>
        </tr>
        @foreach($users->permissions as $permission)
        <tr>
            <td>Has Permission</td>
            <td>{{$permission->name}}</td>
        </tr>
@endforeach
        <table>
</div>
@endsection