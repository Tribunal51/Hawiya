<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SocialMediaOrder;
use App\SocialMediaPost;
use App\User;

class SocialMediaOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = SocialMediaOrder::all();
        return $orders;

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
        //

        if(!isset($request->user_id) || !isset($request->package) || !isset($request->logo_photo) || !isset($request->posts)) {
            return -2;  //echo "Required fields missing";
        } 
        if(!User::find($order->user_id)) {
            return -3;  // echo "User not found.";
        }
        if(!is_array($request->posts)) {
            return -4;  // echo "No Array found for Posts.";
        } 

        $logo_image = '';
        
        if($request->hasFile('logo_photo')) {
            $allowedFileExtension = ['pdf', 'jpg', 'png', 'docx'];
            $files = $request->file('logo_photo');
            $extension = $file->getClientOriginalExtension();
            $check = in_array($extension, $allowedFileExtension);
            if($check) {
                $filename = ltrim($file->store('public/uploads'));
                $logo_image = $filename;                
            }
            else {
                return -6;  // echo "Wrong file format";
            }
        }
        else {
            return -5;  // echo "File not found";
        }

        $order = SocialMediaOrder::create([
            'user_id' => $request->user_id,
            'package' => $request->package,
            'logo_photo' => $logo_image
        ]);
        
        foreach($request->posts as $post) {
            if(!isset($post->image) || !isset($post->comment)) {
                return -7;  // echo "Required fields missing for the Post";
            }
            else {
                $new_post = new SocialMediaPost;
                $new_post->comment = $post->comment;
                $new_post->order_id = $order->id;
                if($post->hasFile('image')) {
                    $allowedFileExtension = ['pdf', 'jpg', 'png', 'docx'];
                    $file = $request->file('image');
                    
                    $extension = $file->getClientOriginalExtension();
                    $check = in_array($extension, $allowedFileExtension);
                    if($check) {
                        $filename = ltrim($file->store('public/uploads'));
                        $new_post->image = $filename;  
                        
                        if(!$new_post->save()) {
                            return -10;  // echo "Post could not be saved";
                        }              
                    }
                    else {
                        return -9;  // echo "Wrong file format for the Post";
                    }
                }
                else {
                    return -8; // echo "File not found for the Post.";
                }
            }
            
        }
        
        if($order) {
            return $order->id;  // echo "Order registered";
        }
        else {
            return -1;  // echo "Order could not be registered. Please investigate.";
        }
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
    public function destroy($id)
    {
        //
    }
}
