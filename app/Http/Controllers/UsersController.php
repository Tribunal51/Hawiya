<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Issue;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;

use App\Models\User\Address;

use App\Traits\GetOrders;

use App\Models\PendingReorder;

use Validator;

use App\Notifications\UserRegistered;

class UsersController extends Controller
{
    use GetOrders;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$user = User::find(2);
        //return $user;

        $users = User::with('addresses')->get();
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
            $new_user->name = $request -> input('name');
            $new_user->email = $request -> input('email');
            $new_user->mobile = $request -> input('mobile');
            $new_user->password = Hash::make($request -> input('password'));
            $new_user->admin = false;
            $new_user->device_token = $request->input('device_token');
            $new_user->device_OS = $request->input('device_OS');
            $new_user->lang = $request->input('lang');
            $new_user->google = false;

            if(!isset($new_user->name) || !isset($new_user->email) || !isset($new_user->password)) {
                return -3; //echo "Required fields missing"
            } else if($new_user -> save()) {
                //echo "User registered";

                $new_user->notify(new UserRegistered($new_user));
                return $new_user->id;
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
        $user = User::with('addresses')->find($request->user_id);
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
        if(isset($request->lang)) {
            $user->lang = $request->lang;
        }
        if(isset($request->device_token)) {
            $user->device_token = $request->device_token;
        }
        if(isset($request->device_OS)) {
            $user->device_OS = $request->device_OS;
        }

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

                if(isset($request->device_token)) {
                    $user->device_token = $request->device_token;
                } 
                if(isset($request->device_OS)) {
                    $user->device_OS = $request->device_OS;
                }
                if(isset($request->lang)) {
                    $user->lang = $request->lang;
                } 
                if($user->save()) {
                    return $user->id;   // echo "User ID";
                }
                else {
                    return -5;  // echo "User device settings could not be saved.";
                }
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

    public function googleLogin(Request $request) {
        if(!isset($request->email)) {
            return -2;  // echo "Required fields missing.";
        }
        $user = User::where('email', $request->email)->first();
        if($user) {
            // if($user->google) {
            //     return -3;  // echo "Existing user has a google login already.";
            // }
            $user->google = true;
            
            if($user->save()) {
                return $user->id;   // echo "Existing user logged into Google successfully.";
            }
            else {
                return -1;  // echo "Existing user could not be logged into Google. Please investigate.";
            }
        }
        else {
            if(!isset($request->name)) {
                return -2;  // echo "Required fields missing";
            }
            $new_user = new User;
            $new_user->email = $request->email;
            $new_user->name = $request->name;
            $new_user->google = true;
            $new_user->mobile = $request->mobile;
            $new_user->lang = $request->lang ? $request->lang : 'en';
            $new_user->device_token = $request->device_token;
            $new_user->device_OS = $request->device_OS;
            if($new_user->save()) {
                return $new_user->id;   // echo "New User registered and logged into Google successfully.";
            }
            else {
                return -1;  // echo "New User could not be registered. Please investigate.";
            }
        }
    }


    public function addAddress(Request $request, $id) {
        $user = User::find($id);
        if(!$user) {
            return -3;  // echo "User not found.";
        }
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string',
            'zipcode' => 'nullable|string',
            'block' => 'nullable|string',
            'street' => 'nullable|string',
            'avenue' => 'nullable|string',
            'house' => 'nullable|string',
            'building' => 'nullable|string',
            'floor' => 'nullable|string',
            'apartment' => 'nullable|string',
            'phone' => 'nullable|string',
            'notes' => 'nullable|string',
            'city' => 'nullable|string',
            'country' => 'nullable|string'
        ], [
            'required' => -2
        ]);
        if($validator->fails()) {
            return $validator->errors()->first();
        }

        $address = $user->addresses()->create([
            'title' => $request->title,
            'zipcode' => $request->zipcode,
            'block' => $request->block,
            'street' => $request->street,
            'avenue' => $request->avenue,
            'house' => $request->house,
            'building' => $request->building,
            'floor' => $request->floor,
            'apartment' => $request->apartment,
            'phone' => $request->phone, 
            'notes' => $request->notes,
            'city' => $request->city,
            'country' => $request->country
        ]);
        if(!$address) {
            return -1;  // echo "Address could not be created.";
        }
        return $address->id;
        

    }

    public function getUserAddresses(Request $request, $id) {
        $user = User::find($id);
        if(!$user) {
            return -3;  // echo "User not found.";
        }
        return $user->addresses;
    }

    public function deleteAddress(Request $request, $id) {
        $address = Address::find($id);
        if(!$address) {
            return -3;  // echo "Address not found.";
        }
        if(!$address->delete()) {
            return -1;  // echo "Address could not be deleted.";
        }
        return 1;
    }

    

   



    
}
