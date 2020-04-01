@extends('layouts.sales')

@section('admin')
    @include('sales.components.reorder')
    <hr color="black">
    @include('sales.components.order')
@endsection 