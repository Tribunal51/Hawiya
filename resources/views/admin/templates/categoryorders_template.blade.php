@extends('layouts.admin')

@section('admin')
    
    @section('categories_section')
        @include('admin.components.categories_panel') 
    @endsection 

    @section('content_section')
        @include('admin.orders.'.$category->id)
    @endsection 
@endsection 