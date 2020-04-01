@extends('layouts.store')

@section('admin')
    <h3> Pending Orders </h3> 
    @include('store.components.orders', ['orders' => $pending_orders])
    <hr> 
    <h3> Assigned Orders </h3> 
    @include('store.components.orders', ['orders' => $assigned_orders])
@endsection 