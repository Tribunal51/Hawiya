@extends('layouts.app')


@section('content')
    
    <example-component 
    :authuser="{{ Auth::user() ? Auth::user()->id : -1 }}" 
    reset="{{ session()->has('reset') ? session('reset') : false }}"
    :verified="{{ Auth::user() ? (Auth::user()->email_verified_at ? 1 : 0) : 0 }}" 
    >
    </example-component>


    {{-- <home-page></home-page>     --}}

@endsection


