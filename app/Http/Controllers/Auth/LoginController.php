<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;

use Illuminate\Http\Request;



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';
    //protected $redirectTo = '/';
    protected function redirectTo() {
        if(session()->has('referralUrl')) {
            return session()->get('referralUrl');
        } 
        else {
            return '/home';
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        //
        if(isset($user->lang)) {
            session()->put('locale', strtolower($user->lang));
        }
        return redirect()->intended('/');
       
    }

    

    /** 
     * Redirect the user to the Google authentication Page 
     * 
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider() {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     * 
     * @return \Illuminate\Http\Response
     */

    public function handleProviderCallback() {
        try {
            $user = Socialite::driver('google')->user();
        }
        catch (\Exception $e) {
            return redirect('/login');
        }

        // only allow people with @company.com to login 
        // if(explode("@", $user->email)[1] !== 'gmail.com') {
        //     return redirect()->to('/');
        // }

        // Check if they are an existing user 
        $existing_user = User::where('email', $user->email)->first();
        if($existing_user) {
            $existing_user->google = true;
            if($existing_user->save()) {

                // Log them in
                auth()->login($existing_user, true);
                if(!$existing_user->email_verified_at) {
                    $existing_user->sendEmailVerificationNotification();
                }
            }
            else {
                return redirect()->route('/login');
            }
        }
        else {
            // Create a new user 
            
            $newUser = new User;
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $newUser->lang = 'en';
            $newUser->google = true;
            
            // $newUser->avatar = $user->avatar;
            //$newUser->avatar_original = $user->avatar_original;

            $newUser->save();
            auth()->login($newUser);
            $newUser->sendEmailVerificationNotification();
        }
        return redirect()->intended('/home');
    }

    

   
}
