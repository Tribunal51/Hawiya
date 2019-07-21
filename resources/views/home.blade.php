@extends('layouts.app')

@section('content')
<dashboard
    :authuser="{{ Auth::user() ? Auth::user() : null }}" 
    :verified="{{ Auth::user() ? (Auth::user()->email_verified_at ? 1 : 0) : 0 }}" 
></dashboard>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
