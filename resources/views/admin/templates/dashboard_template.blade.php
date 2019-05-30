@extends('layouts.admin')

@section('admin')
    <h1>
        Admin Dashboard
    </h1>
    <a href="/dashboard/addProfile" role="button" class="btn btn-primary">Manage Profiles</a>
    <a href="/dashboard/users" role="button" class="btn btn-success">Manage Users</a>
@endsection