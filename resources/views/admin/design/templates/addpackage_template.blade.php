@extends('admin.design.templates.databoard_template')

@section('addData')
    <h1>{{ $data['category']->name }}</h1>
    @include('admin.design.components.addpackage')
    <hr>
    @include('admin.design.components.packages')
@endsection 
