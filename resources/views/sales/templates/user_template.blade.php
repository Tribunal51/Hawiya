@extends('layouts.sales')

@section('sales')   
    @include('components.user')
    <hr>
    @include('sales.components.create_orders_section')
@endsection 