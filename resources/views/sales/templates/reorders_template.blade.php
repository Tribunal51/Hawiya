@extends('layouts.sales', ['reorders_pending' => $reorders_pending])

@section('admin')
    <h3>Pending Reorders</h3>
    @include('sales.components.reorders', ['reorders' => $reorders_pending])
    <hr color="black" />
    <h3>Assigned Reorders</h3>
    @include('sales.components.reorders')
    
@endsection 