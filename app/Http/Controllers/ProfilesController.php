<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Profile;
use App\Upload;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $profiles = Profile::with('uploads')->get();
        $sorted_profiles = [];
        if( !isset($request->category) ) {
            return $profiles;
        }
        else {
            foreach($profiles as $profile) {
                if($profile->category === $request->category) {
                    array_push($sorted_profiles, $profile);
                }
            }
            return $sorted_profiles;
        }
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
        // $this->validate($request, [
        //     'title' => 'required',
        //     'category' => 'required'
        // ]);

        // $new_profile = Profile::create([
        //     'title' => $request->title,
        //     'category' => $request->category
        // ]);

        
        // $file_list = [];
        // if($request -> hasFile('my_file')) {
        //     $allowedFileExtension = ['pdf', 'jpg', 'png', 'docx'];
        //     $files = $request->file('my_file');
        //     foreach($files as $file) {
        //         $filename = $file->getClientOriginalName();
        //         $extension = $file->getClientOriginalExtension();
        //         $check = in_array($extension, $allowedFileExtension);
        //         if($check) {
        //             $filename = ltrim($file->store('public/uploads'), 'public/uploads');
                    
        //             $upload = new Upload;
        //             $upload->upload_id = $new_profile->id;
        //             $upload->filename = $filename;
        //             $upload->save();


        //             // foreach($request->my_file as $photo) {
        //             //     $filename = $photo->store('public/uploads');

        //             //     $upload = new Upload;
        //             //     $upload->upload_id = $new_profile->id;
        //             //     $upload->filename = $filename;
        //             //     $upload->save();

        //             // }

        //             echo "Upload successfully";

        //         }
        //         else {
        //             redirect('AddProfile')->with('error', 'Files not uploaded in valid format');
        //             //redirect('/dashboard/addProfile')->with(['error' => 'Files not uploaded in valid format']);
        //         }
        //     }
        // }

        // if($new_profile) {
        //     return redirect('AddProfile')->with('success', 'Profile created');
        //     //return redirect('/dashboard/addProfile')->with(['success' => 'Profile is created.']);
        //     //return Profile::where('title','=', $new_profile->title);
        // }
        // else {
        //     return redirect('AddProfile')->with('error', 'Profile could not be created');
        //     return redirect('AddProfile')->with('error', 'Profile could not be created');
        // }
        
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {   
        
    }

    // public function deleteProfile(Request $request) {
    //     if(isset($request->profiles)) {
    //         foreach($profiles as $profile) {
    //             $profile_to_delete = Profile::find($profile);
    //             if(!$profile_to_delete) {
    //                 return redirect('AddProfile')->with('error', 'Profile(s) not found'.$profile_to_delete);
    //             }
    //             else {
    //                 if($profile->delete()) {
    //                     return redirect('AddProfile')->with('success', 'Profile(s) deleted');
    //                 }
    //                 else {
    //                     return redirect('AddProfile')->with('error', 'Profile(s) could not be deleted');
    //                 }
    //             }
    //         }
    //     }


    //     $profile = Profile::find($request->id);
    //     if(!$profile) {
    //         return redirect('AddProfile')->with('error', 'Profile not found');
    //     }
    //     else {
    //         if($profile->delete()) {
    //             return redirect('AddProfile')->with('success', 'Profile deleted');
    //         }
    //         else {
    //             return redirect('AddProfile')->with('error', 'Profile could not be deleted. Please investigate.');
    //         }
    //     }
    // }

    // public function filter(Request $request) {
    //     $profiles = Profile::with('uploads')->get();
    //     $sorted_profiles = [];
    //     if( !isset($request->category)) {
    //         return $profiles;
    //     }
    //     else {
    //         foreach($profiles as $profile) {
    //             if($profile->category === $request->category) {
    //                 array_push($sorted_profiles, $profile);
    //             }
    //         }
    //         return $sorted_profiles;
    //     }
    // }

    
    
}
