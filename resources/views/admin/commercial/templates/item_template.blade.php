@extends('layouts.admin')

@section('admin')
    @include('admin.commercial.components.item')
    <a href={{"/dashboard/admin/data/commercial/items"}} class="btn btn-secondary">Back</a> 
    <a href={{"/dashboard/admin/data/commercial/item/".$item->id."/edit"}} class="btn btn-primary"> Edit Item </a>
    <hr color="black">
    @include('admin.commercial.components.adddesign')
    <hr color="black">
    @include('admin.commercial.components.designs')
@endsection 

