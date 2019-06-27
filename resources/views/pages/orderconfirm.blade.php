@extends('layouts.app')

@section('content')

    <confirm-order 
        :authuser="{{ Auth::user() ? Auth::user()->id : -1 }}"
        :verified="{{ Auth::user() ? (Auth::user()->email_verified_at ? 1 : 0) : 0 }}"></confirm-order>

@endsection