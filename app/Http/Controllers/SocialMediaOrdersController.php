<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SocialMediaOrder;
use App\SocialMediaPost;
use App\User;
use App\Helpers\AppHelper as Helper;

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
        // $orders = SocialMediaOrder::with('posts')->get();
        // return $orders;
        

        $orders = SocialMediaOrder::get(['id','user_id','package','logo_photo']);
        
        foreach($orders as $order) {
            $filename = $order->logo_photo;
            $order->logo_photo = "http://hawiya.net/storage/uploads/".$filename;
            $posts_to_append = [];
            $posts = SocialMediaPost::where('order_id', $order->id)->get(['image', 'comment']);
            
            foreach($posts as $post) {
                $post->image = "http://hawiya.net/storage/uploads/".$post->image;
                array_push($posts_to_append, $post);
            }
            $order->posts = $posts_to_append;
        }
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
        //return Helper::check_file($request->logo_photo);
        if(!isset($request->user_id) || !isset($request->package) || !isset($request->logo_photo) || !isset($request->posts)) {
            return -2;  //echo "Required fields missing";
        } 
        if(!User::find($request->user_id)) {
            return -3;  // echo "User not found.";
        }
        if(!is_array($request->posts)) {
            return -4;  // echo "No Array found for Posts.";
        } else if(sizeof($request->posts) < 1) {
            return -5;  // echo "Empty Posts Array";
        }


        if(!Helper::check_file($request->logo_photo)) {
            return -6;  // echo "Wrong file format.";
            
        }
  
        
        // if($request->hasFile('logo_photo')) {
        //     $allowedFileExtension = ['pdf', 'jpg', 'png', 'docx'];
        //     $files = $request->file('logo_photo');
        //     $extension = $file->getClientOriginalExtension();
        //     $check = in_array($extension, $allowedFileExtension);
        //     if($check) {
        //         $filename = ltrim($file->store('public/uploads'));
        //         $logo_image = $filename;                
        //     }
        //     else {
        //         return -6;  // echo "Wrong file format";
        //     }
        // }
        // else {
        //     return -5;  // echo "File not found";
        // }

       
        
        foreach($request->posts as $post) {
            //return $post;

            if(!isset($post['comment'])) {
                return -7;  // echo "Required fields missing for the Post";
            }
            else {
                if(!Helper::check_file($post['image'])) {
                    return -8;  // echo "File format wrong for one or more posts";
                }
            }
        }

        $order = new SocialMediaOrder;
        $order->user_id = $request->user_id;
        $order->package = $request->package;
        $order->logo_photo = Helper::save_file($request->logo_photo);
        
       
        if(!$order->save()) {
            return -1;  // echo "Order could not be saved.";
        }
        // $order = SocialMediaOrder::create([
        //     'user_id' => $request->user_id,
        //     'package' => $request->package,
        //     'logo_photo' => $filename
        // ]);

        

        foreach($request->posts as $post) {
            $new_post = new SocialMediaPost;
            $new_post->comment = $post['comment'];
            $new_post->order_id = $order->id;
            $new_post->image = Helper::save_file($post['image']);
            if(!$new_post->save()) {              
                return -9;  // echo Could not save a Post.
               
            }
        }
                // $new_post = new SocialMediaPost;
                // $new_post->comment = $post->comment;
                // $new_post->order_id = $order->id;
                // if($post->hasFile('image')) {
                //     $allowedFileExtension = ['pdf', 'jpg', 'png', 'docx'];
                //     $file = $request->file('image');
                    
                //     $extension = $file->getClientOriginalExtension();
                //     $check = in_array($extension, $allowedFileExtension);
                //     if($check) {
                //         $filename = ltrim($file->store('public/uploads'));
                //         $new_post->image = $filename;  
                        
                //         if(!$new_post->save()) {
                //             return -10;  // echo "Post could not be saved";
                //         }              
                //     }
                //     else {
                //         return -9;  // echo "Wrong file format for the Post";
                //     }
                // }
                // else {
                //     return -8; // echo "File not found for the Post.";
                // }
        
                    
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
