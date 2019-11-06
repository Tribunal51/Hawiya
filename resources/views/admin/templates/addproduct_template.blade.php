{{-- @extends('layouts.admin')

@section('admin')
    Add Product {{ $data }}
@endsection --}}
@extends('admin.templates.databoard_template')

@section('addData')
    
    <h1>{{ $data['category']->name }}</h1>
    @include('admin.components.addproduct')
    <hr>
    @include('admin.components.products')
@endsection 