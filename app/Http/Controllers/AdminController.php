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
            'category' => 'required',
            'details' => 'required'
        ]);

        $new_profile = Profile::create([
            'title' => $request->title,
            'category' => $request->category,
            'details' => $request->details
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
                    if(!$upload->save()) {                    
                        return redirect('/dashboard/addProfile')->with('error', 'One or more files could not be uploaded');
                    }
                    // $upload->save();
                     

                    // foreach($request->my_file as $photo) {
                    //     $filename = $photo->store('public/uploads');

                    //     $upload = new Upload;
                    //     $upload->upload_id = $new_profile->id;
                    //     $upload->filename = $filename;
                    //     $upload->save();

                    // }

                    // echo "Upload successfully";

                }
                else {
                    return redirect('/dashboard/addProfile')->with('error', 'Files not uploaded in valid format');
                }
            }
        }

        if($new_profile) {
            return redirect('/dashboard/addProfile')->with('success', 'Profile Created');
        }
        else {
            return redirect('/dashboard/addProfile')->with('error','Profile could not be created');       
        }
    }

    

    public function editProfile(Request $request) {
        echo $request->id;
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
