@extends('layouts.app')


@section('content')
    
    <example-component 
    :authuser="{{ Auth::user() ? Auth::user()->id : -1 }}" 
    reset="{{ session()->has('reset') ? session('reset') : false }}">
    </example-component>


    {{-- <home-page></home-page>     --}}

@endsection


