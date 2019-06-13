<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\User;
use App\Profile;

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

    public function dashboardPage() {
        return $this->routeIfAdmin('dashboard');
    }

    public function usersPage() {
        $users = User::all();
        return $this->routeIfAdmin('users')->with('users', $users);
    }

    public function addProfilePage() {
        $profiles = Profile::all();
        //return redirect('AddProfilePage')->with('profiles', $profiles);
         return $this->routeIfAdmin('addprofile')->with('profiles', $profiles);
    }

    public function editProfilePage(Request $request) {
        $profile = Profile::find($request->id);
        return $this->routeIfAdmin('editprofile')->with('profile', $profile);
    }

    public static function routeIfAdmin($page) {
        if(Auth::guest()) {
            return redirect('/home');
        }
        else {
            if(Auth::user()->admin) { 
                return view('admin.'.$page);                                           
            }
            else {
                return redirect('/');
            }
        }
    }
}
