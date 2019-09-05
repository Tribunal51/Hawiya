<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Issue;

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
        foreach($users as $user) {
            $user->issues = Issue::where('user_id', '=', $user->id)->get(['id', 'title', 'issue']);
        }
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
            $new_user -> mobile = $request -> input('mobile');
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
        if(!isset($request->user_id)) {
            return -2;  // echo "Required fields missing";
        }
        $user = User::find($request->user_id);
        if(!$user) {
            return -3;  // echo "User not found";
        }
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
        if(!isset($request->user_id)) {
            return -2; // echo "Required fields missing"
        }
        $user = User::find($request->user_id);
        if(!$user) {
            return -3;  // echo "User not found.";
        }
        if(isset($request->name)) {
            $user->name = $request->name;
        }
        if(isset($request->mobile)) {
            $user->mobile = $request->mobile;
        }

        if(isset($request->new_password)) {
            if(!isset($request->password)) {
                return -4;  // echo "Required password missing.";
            }
            
            if(!Hash::check($request->password, $user->password)) {
                return -5;  // echo "Wrong Password.";
            } 
            else {
                $user->password = Hash::make($request->new_password);
            }
        }

        // Change Email, maybe for later
        // if(isset($request->email)) {
        //     if(!isset($request->password)) {
        //         return -4;  // echo "Required Password missing.";
        //     }
        //     if($user->password !== Hash::make($request->password)) {
        //         return -5;  // echo "Wrong Password.";
        //     }
        //     else {
        //         $user->email = $request->email;
        //     }
        // }
        
        if($user->save()) {
            return $user->id;   // echo "User details modified";
        } else {
            return -1;  // "User could not be modified.";
        }
        
        // if(User::find($request->user_id)) {

        //     $name = $request->input('name');
        //     $email = $request->input('email');
        //     $mobile = $request->input('mobile');
        //     $password = $request->input('password');   
        //     // $admin =$request->input('admin');                     

        //     // $data = Input::all();
            

        //     $user = User::findOrFail($request->user_id);
        //     // $user->fill($data);
        //     $user->name = $name ? $name : $user->name;
        //     $user->email = $email ? $email : $user->email;
        //     $user->mobile = $mobile ? $mobile : $user->mobile;
        //     $user->password = $password ? Hash::make($password) : $user->password;
        //     // $user->admin =  isset($admin) ? $admin : $user->admin;

        //     if(User::where('email', '=', $user->email)) {
        //         return -4; //echo "Email already registered"
        //     } else if($user->save()) {
        //         return 1; //echo "User registered"
        //     } else {
        //         return -1; //echo "Error occured"
        //     }
        // } else {
        //     return -3; //echo "User does not exist"
        // }

        
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
                return 1;   // echo "User deleted"
                //return $user_to_delete;
            }
            else {
                return -1; // echo "User could not be deleted. Please investigate.
            }
        }
        else {
            return -2; // User not found
        }
    }

    public function login(Request $request) {
        if(!isset($request->email) || !isset($request->password)) {
            return -2; // echo "Required fields missing";
        }
        if(User::where('email',$request->email)->first()) {
            $user = User::where('email', $request->email)->first();
            if(Hash::check($request->password, $user->password)) {
                return $user->id; // echo "User ID";
            }
            else {
                return -4; // echo "Wrong Password";
            }
        }
        else {
            return -3; // echo "User does not exist";
        }

        

        
    }

    public function resetPassword(Request $request) {
        
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
