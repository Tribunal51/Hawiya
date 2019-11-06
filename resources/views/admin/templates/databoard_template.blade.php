@extends('layouts.admin')

@section('admin')
    <div class="row">
        <div class="col-md-4">
            @include('admin.components.categories_panel')
        </div>
        <div class="col-md-8">
            @yield('addData')
        </div>
    </div>    

@endsection