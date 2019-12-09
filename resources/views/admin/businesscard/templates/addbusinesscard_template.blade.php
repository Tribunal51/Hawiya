@extends('layouts.admin')

@section('admin')
    @include('admin.businesscard.components.addbusinesscard')
    <hr> 
    @include('admin.businesscard.components.businesscards')
@endsection 