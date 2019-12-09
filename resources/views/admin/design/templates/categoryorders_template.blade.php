@extends('layouts.admin')

@section('admin')
    
    @section('categories_section')
        @include('admin.design.components.categories_panel') 
    @endsection 

    @section('content_section')
        @include('admin.design.orders.'.$category->id)
    @endsection 
@endsection 