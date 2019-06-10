<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\User;
use App\Profile;
use App\Upload;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return $this->routeIfAdmin('dashboard');
        if(Auth::guest()) {
            return redirect('/home');
        }
        else {
            if(Auth::user()->admin) {
                return view('admin.dashboard');
            }
            else {
                return redirect('/');
            }
        }
    }

    public function usersPage() {
        $users = User::all();
        return $this->routeIfAdmin('users')->with('users', $users);
    }

    public function profiles() {
        $profiles = Profile::all();
        return $this->routeIfAdmin('profiles')->with('profiles', $profiles);
    }

    public function orders() {
        return $this->routeIfAdmin('orders');
    }

    public function addProfilePage() {
        $profiles = Profile::all();
        //return redirect('AddProfilePage')->with('profiles', $profiles);
         return $this->routeIfAdmin('addprofile')->with('profiles', $profiles);
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

    public function setAdmin(Request $request) {
        $user = User::find($request->id);
        $user->admin = !$user->admin;
        if($user->save()) {
            // return $this->routeIfAdmin('users')->with('succes', 'Admin Status Changed');
            return redirect('/dashboard/users')->with('success', 'Admin status changed');
        }
        else {
            //return $this->routeIfAdmin('users')->with('error', 'Could not change admin status. Please investigate');
            return redirect('/dashboard/users')->with('error', 'Could not change admin status. Please investigate');
        }
    }


    public function addProfile(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'category' => 'required'
        ]);

        $new_profile = Profile::create([
            'title' => $request->title,
            'category' => $request->category
        ]);

        
        $file_list = [];
        if($request -> hasFile('my_file')) {
            $allowedFileExtension = ['pdf', 'jpg', 'png', 'docx'];
            $files = $request->file('my_file');
            foreach($files as $file) {
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedFileExtension);
                if($check) {
                    $filename = ltrim($file->store('public/uploads'), 'public/uploads');
                    
                    $upload = new Upload;
                    $upload->upload_id = $new_profile->id;
                    $upload->filename = $filename;
                    $upload->save();


                    // foreach($request->my_file as $photo) {
                    //     $filename = $photo->store('public/uploads');

                    //     $upload = new Upload;
                    //     $upload->upload_id = $new_profile->id;
                    //     $upload->filename = $filename;
                    //     $upload->save();

                    // }

                    echo "Upload successfully";

                }
                else {
                    return $this->routeIfAdmin('addprofile')->with('error', 'Files not uploaded in valid format');
                    //redirect('AddProfile')->with('error', 'Files not uploaded in valid format');
                    //redirect('/dashboard/addProfile')->with(['error' => 'Files not uploaded in valid format']);
                }
            }
        }

        if($new_profile) {
            return redirect('/dashboard/addProfile')->with('success', 'Profile Created');
            //return $this->routeIfAdmin('addprofile')->with('success', 'Profile created');
            //return redirect('AddProfile')->with('success', 'Profile created');
            //return redirect('/dashboard/addProfile')->with(['success' => 'Profile is created.']);
            //return Profile::where('title','=', $new_profile->title);
        }
        else {
            return redirect('/dashboard/addProfile')->with('error','Profile could not be created');
            //return $this->routeIfAdmin('addprofile')->with('error', 'Profile could not be created');
            //return redirect('AddProfile')->with('error', 'Profile could not be created');
        
        }
    }

    public function deleteProfile(Request $request) {
        if(isset($request->selectedProfiles)) {            
            foreach($request->selectedProfiles as $profile) {
                $profile_to_delete = Profile::find($profile);
                if(!$profile_to_delete) {
                    
                    return redirect('/dashboard/addProfile')->with('error', 'Profile(s) not found'.$profile_to_delete);
                }    
                else {
                    if($profile_to_delete->delete()) {
                        return redirect('/dashboard/addProfile')->with('success', 'Profile(s) deleted');
                    }
                    else {
                        return redirect('/dashboard/addProfile')->with('error', 'Profile(s) could not be deleted');
                    }
                }
            }
        }

        
        

        $profile = Profile::find($request->id);
        if(!$profile) {
            return redirect('/dashboard/addProfile')->with('error', 'Profile not found');
        }
        else {
            if($profile->delete()) {
                return redirect('/dashboard/addProfile')->with('success', 'Profile deleted');
                
            }
            else {
                return redirect('/dashboard/addProfile')->with('error', 'Profile could not be deleted. Please investigate.');
            }
        }
    }

}
