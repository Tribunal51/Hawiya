@extends('layouts.sales')

@section('admin')
    <h3>Master Order Information</h3>
    @include('sales.components.masterorder')

    <h3>User Information</h3> 
    {{-- @include('components.user', ['user' => $user->id]) --}}
@endsection 