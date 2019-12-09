{{-- @extends('layouts.admin')

@section('admin')
    Add Product {{ $data }}
@endsection --}}
@extends('admin.design.templates.databoard_template')

@section('addData')
    
    <h1>{{ $data['category']->name }}</h1>
    @include('admin.design.components.addproduct')
    <hr>
    @include('admin.design.components.products')
@endsection 