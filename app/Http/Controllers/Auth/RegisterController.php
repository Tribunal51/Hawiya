<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = '/';
    // protected function redirectTo() {
    //     //return '/payment?worked=false';
    //     // if(session()->has('referralUrl')) {
    //     //     echo session('referralUrl');
    //     //     $url = session('referralUrl');
    //     //     session()->forget('referralUrl');
    //     //     return redirect($url);
    //     // }
    //     // else {
    //     //     echo session();
    //     //     return '/home?test=true';
    //     // }
    //     return '/';
    // }

    protected function redirectTo() {
        if(session()->has('referralUrl')) {
            return session('referralUrl');
        }
    }
    
    


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['string'],
            'lang' => ['string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'lang' => $data['lang'],
            'password' => Hash::make($data['password']),
            
        ]);
    }

    protected function registered(Request $request, $user)
    {
        if(isset($user->lang)) {
            session()->put('locale', strtolower($user->lang));
        }
        return redirect()->intended('/');
            
    }



    

}
