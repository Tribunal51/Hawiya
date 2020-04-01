@extends('layouts.admin')

@section('admin')
    @include('admin.commercial.components.design')
    <a href={{"/dashboard/admin/data/commercial/design/".$design->id."/label/create"}} class="btn btn-success">Create Label</a>
    <hr>
    @include('admin.commercial.components.design_colors')
    <hr>
    @include('admin.commercial.components.design_labels')
    
    <hr>
    {{-- @include('admin.commercial.components.addlabel') --}}
@endsection 