@extends('layouts.app')

@section('content')
    <v-app>
        <report order-string="{{ $order }}" client-string="{{ $client }}" />
    </v-app>
@endsection