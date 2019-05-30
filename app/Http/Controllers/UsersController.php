<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$user = User::find(2);
        //return $user;

        $users = User::all();
        return $users;
        //return UserResource::collection($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::where('email',$request->input('email'))->first();
        if($user) {
            return -2; //echo "User already exists.";
        }
        else {
            $new_user = new User;
            // $new_user -> id = $request->input('id');
            $new_user-> name = $request -> input('name');
            $new_user -> email = $request -> input('email');
            $new_user -> password = Hash::make($request -> input('password'));
            $new_user -> admin = false;

            if(!isset($new_user->name) || !isset($new_user->email) || !isset($new_user->password)) {
                return -3; //echo "Required fields missing"
            } else if($new_user -> save()) {
                //echo "User registered";
                return User::where('email',$new_user->email)->first()->id;
                //return User::where('email','=',$new_user->email)->id;
                //return new UserResource($new_user);
            }
            else {
                return -1; //echo "Could not be saved. Please investigate.";
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $user = User::find($request->UserId);
        return $user;
        //return new UserResource($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if(User::find($request->user_id)) {

            $name = $request->input('name');
            $email = $request->input('email');
            $password = $request->input('password');   
            $admin =$request->input('admin');                     

            // $data = Input::all();
            

            $user = User::findOrFail($request->user_id);
            // $user->fill($data);
            $user->name = $name ? $name : $user->name;
            $user->email = $email ? $email : $user->email;
            $user->password = $password ? Hash::make($password) : $user->password;
            $user->admin =  isset($admin) ? $admin : $user->admin;

            if(!isset($user->name) || !isset($user->email) || !isset($user->password)) {
                return -2; //echo "Required fields missing"
            } else if(User::where('email', '=', $user->email)) {
                return -4; //echo "Email already registered"
            } else if($user->save()) {
                return 1; //echo "User registered"
            } else {
                return -1; //echo "Error occured"
            }
        } else {
            return -3; //echo "User does not exist"
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if(User::find($request->user_id)) {
            $user_to_delete = User::findOrFail($request->user_id);
            if($user_to_delete -> delete()) {
                echo "User deleted.";
                return $user_to_delete;
            }
            else {
                echo "User could not be deleted";
            }
        }
        else {
            echo "User not found";
        }
    }

    // public function setAdmin(Request $request) {
    //     $user = User::find($request->id);
    //     $user->admin = !$user->admin;
    //     if($user->save()) {
    //         return redirect('/dashboard/users')->with('success', 'Admin status changed');
    //     }
    //     else {
    //         return redirect('/dashboard/users')->with('error', 'Could not change admin status. Please investigate');
    //     }
    // }
}
