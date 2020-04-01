@extends('layouts.admin')

@section('admin')
    @include('admin.personal.components.item')
    <a href={{"/dashboard/admin/data/personal/item/".$item->id."/edit"}} class="btn btn-secondary">Edit Item</a>
    <hr color="black"> 
    @include('admin.personal.components.addsubitem')
    <hr color="black"> 
    @include('admin.personal.components.subitems')
    
@endsection 