@extends('layouts.app')

@section('content')
{{-- {{ "Intended URL".session()->get('url.intended')."Referral Url".session()->get('referralUrl')}} --}}
<div class="container alignLang">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                    
                    {{ session()->get('redirect_after_email_verification')}}
                    {{ session()->get('referralUrl')}}
                    {{ session()->get('intended')}}

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
