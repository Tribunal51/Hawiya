@extends('layouts.app')

@section('content')
    Payments
   Referral Url:  {{ session('referralUrl')}}
    <payment></payment>
@endsection