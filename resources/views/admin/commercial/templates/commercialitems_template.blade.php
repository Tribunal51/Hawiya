@extends('layouts.admin')

@section('admin')
    @include('admin.commercial.components.addcommercialitem')
    <hr>
    @include('admin.commercial.components.commercialitems')
@endsection 