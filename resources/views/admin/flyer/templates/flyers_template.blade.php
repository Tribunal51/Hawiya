@extends('layouts.admin')

@section('admin')
    @include('admin.flyer.components.addflyer')
    <hr color="black"> 
    @include('admin.flyer.components.flyers')
@endsection 