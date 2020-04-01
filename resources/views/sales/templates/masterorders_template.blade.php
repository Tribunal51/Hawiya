@extends('layouts.sales')

@section('admin')
    <h3>Pending Orders</h3>
    @include('sales.components.masterorders', ['masterorders' => $pending_masterorders])
    <hr> 

    <h3>Assigned Orders</h3> 
    @include('sales.components.masterorders', ['masterorders' => $assigned_masterorders])
@endsection 