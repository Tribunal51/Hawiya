<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function show(Request $request) {
        
        return $request->user()->hasVerifiedEmail() ? redirect($this->redirectPath()) : view('auth.verify');
    }

    protected function redirectTo() {
        //return "test".session()->get('redirect_after_email_verification');
        if(session()->get('redirect_after_email_verification')) {
            return session()->get('redirect_after_email_verification');
        }
        else if(session()->get('url.intended')) {
            return session()->get('url.intended');
        } 
        else return '/home';
        
    }
}
