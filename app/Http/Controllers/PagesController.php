<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\User;
use App\Profile;
use App\LogodesignOrder;

use Illuminate\Support\Facades\URL;

use App\Helpers\AppHelper as Helper;

class PagesController extends Controller
{

    public function __construct() {
        //return $this->middleware('auth');

        //return $this->middleware('auth',['except' => ['show','index']]);

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('welcome', ["authuser", Auth::user() ? Auth::user() : -1]);
    }

    public function dashboard() {
        return Helper::routeIfAdmin('dashboard');
    }

    public function userDashboard() {
        return view('home', ["authuser", Auth::user() ? Auth::user() : -1]);
    }

    public function users() {
        $users = User::all();
        return Helper::routeIfAdmin('users')->with('users', $users);
    }

    public function addProfile() {
        $profiles = Profile::all();
        //return redirect('AddProfilePage')->with('profiles', $profiles);
         return Helper::routeIfAdmin('addprofile')->with('profiles', $profiles);
    }

    public function editProfile(Request $request) {
        $profile = Profile::find($request->id);
        return Helper::routeIfAdmin('editprofile')->with('profile', $profile);
    }

    public function payment(Request $request) {
        
        //session()->put('referralUrl','http://hawiya.net/test');
        // dd(session('referralUrl'));
        //$this->session('redirect') = URL::previous();
        return view('pages.payment');
        if((URL::previous() !== 'http://hawiya.net/design/logo-design/info') && (!auth()->user())) {
            return view('pages.payment');
        }
        else {
            return redirect('/');
            
        }
            
    }

    public function report($id) {
        $order = LogodesignOrder::where('id', $id)->get()->first();
        //return $order;
        $client = User::where('id', $order->id)->get()->first();
        return view('pages.report')->with(array('order' => $order, 'client' => $client));
    }

    public function orderConfirm(Request $request) {
        return view('pages.orderconfirm');
    }

    

    
}
