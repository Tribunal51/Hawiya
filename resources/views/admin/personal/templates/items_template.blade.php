@extends('layouts.admin')

@section('admin')
    @include('admin.personal.components.additem')
    <hr>
    @include('admin.personal.components.items')
@endsection 