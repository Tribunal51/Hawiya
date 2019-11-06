@extends('layouts.app')

@section('content')
    Payments
   Referral Url:  {{ session('referralUrl')}}
   Intended Url: {{ session('url.intended')}}
    <payment></payment>
@endsection