@extends('layouts.admin')

@section('admin')
    @include('admin.components.addprofile')
    <br /><hr>
    @include('admin.components.profiles')
@endsection