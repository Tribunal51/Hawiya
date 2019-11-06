@extends('admin.templates.databoard_template')

@section('addData')
    <h1>{{ $data['category']->name }}</h1>
    @include('admin.components.addpackage')
    <hr>
    @include('admin.components.packages')
@endsection 
