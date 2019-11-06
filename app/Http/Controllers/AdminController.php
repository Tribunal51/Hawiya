<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\User;
use App\Profile;
use App\Upload;
use App\Product;
use App\Category;
use App\Package;

use App\Helpers\AppHelper as Helper;

use App\Traits\GetOrders;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    use GetOrders; 

    public function index() {
        
    }

    

    

    public function setAdmin(Request $request) {
        $user = User::find($request->id);
        $user->admin = !$user->admin;
        if($user->save()) {
            // return $this->routeIfAdmin('users')->with('succes', 'Admin Status Changed');
            return redirect()->back()->with('success', 'Admin status changed');
        }
        else {
            //return $this->routeIfAdmin('users')->with('error', 'Could not change admin status. Please investigate');
            return redirect()->back()->with('error', 'Could not change admin status. Please investigate');
        }
    }


    public function addProfile(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'details' => 'required'
        ]);

        $category = Category::find($request->category_id); 
        if(!$category) {
            return redirect()->back()->with('error', 'Invalid Category');
        }

        $new_profile = Profile::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'category' => $category->name,
            'details' => $request->details
        ]);

        
        $file_list = [];
        if($request -> hasFile('my_file')) {
            $allowedFileExtension = ['pdf', 'jpg', 'png', 'docx', 'jpeg'];
            $files = $request->file('my_file');
            
            foreach($files as $file) {
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check = in_array(strtolower($extension), $allowedFileExtension);
                if($check) {
                    // $filename = ltrim($file->store('public/uploads'), 'public/uploads');
                    $filename = ltrim($file->store('public/profiles'), 'public/profiles');
                    
                    $upload = new Upload;
                    $upload->upload_id = $new_profile->id;
                    $upload->filename = "http://hawiya.net/storage/profiles/".$filename;
                    if(!$upload->save()) {                    
                        return redirect('/dashboard/admin/addProfile')->with('error', 'One or more files could not be uploaded');
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
                    return redirect('/dashboard/admin/addProfile')->with('error', 'Files not uploaded in valid format');
                }
            }
        }

        if($new_profile) {
            return redirect('/dashboard/admin/addProfile')->with('success', 'Profile Created');
        }
        else {
            return redirect('/dashboard/admin/addProfile')->with('error','Profile could not be created');       
        }
    }

    

    public function editProfile(Request $request, $id) {
        $profile = Profile::find($id);
        if(!$profile) {
            return redirect()->back()->with('error', 'Invalid Profile ID.');
        }
        if(!isset($request->title) || !isset($request->category_id) || !isset($request->details)) {
            return redirect()->back()->with('error', 'Required fields missing.');
        }
        $category = Category::find($request->category_id);
        if(!$category) {
            return redirect()->back()->with('error', 'Invalid Category');
        }

        $profile->title = $request->title;
        $profile->category_id = $request->category_id;
        $profile->category = $category->name; 
        $profile->details = $request->details;
        if(!$profile->save()) {
            return redirect()->back()->with('error', 'Profile could not be modified.');
        }

        if(isset($request->images)) {
            $old_files = Upload::where('upload_id','=',$profile->id)->get();
            // return $old_files;
            foreach($old_files as $file) {
                Helper::delete_data_image(ltrim($file->filename, 'http://hawiya.net/'));
                $file->delete();
            }
            if($request -> hasFile('images')) {
                $file_list = [];
                $files = $request->file('images');
                foreach($files as $file) {
                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $allowedExtensions = ['png', 'jpg', 'jpeg', 'pdf', 'docx'];
                    if(in_array(strtolower($extension), $allowedExtensions)) {
                        $upload = new Upload;
                        $filename = ltrim($file->store('public/profiles'), 'public/profiles');
                        $upload = new Upload;
                        $upload->upload_id = $profile->id;
                        $upload->filename = "http://hawiya.net/storage/profiles/".$filename;
                        if(!$upload->save()) {                    
                            return redirect()->back()->with('error', 'One or more files could not be uploaded');
                        }
                    }
                    else {
                        return redirect()->back()->with('error', 'Invalid file extension');
                    }
                }
            }
        }
        
        return redirect('/dashboard/admin/addProfile')->with('success', 'Profile modified.');
    }

    public function deleteProfile(Request $request) {
        if(isset($request->selectedProfiles)) {            
            foreach($request->selectedProfiles as $profile) {
                $profile_to_delete = Profile::find($profile);
                if(!$profile_to_delete) {
                    
                    return redirect()->back()->with('error', 'Profile(s) not found'.$profile_to_delete);
                }    
                else {
                    if($profile_to_delete->delete()) {
                        //return redirect('/dashboard/addProfile')->with('success', 'Profile(s) deleted');
                    }
                    else {
                        return redirect()->back()->with('error', 'Profile(s) could not be deleted');
                    }
                }
            }
            return redirect('/dashboard/admin/addProfile')->back()->with('success', 'Profile(s) deleted');
        }
        

        $profile = Profile::find($request->id);
        if(!$profile) {
            return redirect()->back()->with('error', 'Profile not found');
        }
        else {
            if($profile->delete()) {
                return redirect()->back()->with('success', 'Profile deleted');
                
            }
            else {
                return redirect()->back()->with('error', 'Profile could not be deleted. Please investigate.');
            }
        }
    }


    public function addProduct(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'title_ar' => 'required',
            'category_id' => 'required',
            'price' => 'required'
        ]);
        $category = Category::find($request->category_id);
        if(!$category) {
            return redirect()->back()->with('error', 'Invalid Category');
        }
        // return $request;
        if(is_file($request->image)) {

            // $allowedFileExtensions = ['png', 'jpg', 'jpeg', 'tif'];
            // $file = $request->file('image');
            // // return $file->getClientOriginalName();
            // $filename = $file->getClientOriginalName();
            // $extension = $file->getClientOriginalExtension();
            // $check = in_array(strtolower($extension), $allowedFileExtensions);
            // if($check) {
            //     switch($request->category_id) {
            //         case 4: $folder = 'products/stationery/';
            //         break;

            //         case 5: $folder = 'products/packaging/';
            //         break;

            //         default: $folder = 'uploads/';
            //     }
            //     $image = 'http://hawiya.net/storage/'.$folder.ltrim($file->store('public/'.$folder), 'public/'.$folder);
            //     // return $image;
            // }
            // else {
            //     return redirect()->back()->with('error', 'Invalid file format.');
            // }   
            //return $request->image;
            $file = $request->file('image');
           $image = Helper::store_data_image($file, $request->category_id);
        }
        // return -2;
        $product = new Product;
        $product->title = $request->title;
        $product->title_ar = $request->title_ar;
        $product->category_id = $request->category_id;
        $product->category_name = $category->name;
        $product->image = isset($image) ? $image : null;
        $product->price = $request->price;
        if($product->save()) {
            return redirect('/dashboard/admin/databoard/addData/'.$category->id)->back()->with('success', 'Product added.');
        }
        else {
            return redirect()->back()->with('error', 'Product could not be added.');
        }
    }

    public function editProduct(Request $request, $id) {
        $product = Product::find($id);
        if(!$product) {
            return redirect()->back()->with('error', 'Invalid Product ID.');
        }
        if(!isset($request->title) || !isset($request->price) || !isset($request->title_ar)) {
            return redirect()->back()->with('error', 'Required fields missing.');
        }
        if(isset($request->image)) {
            if($request->image === null) {
                Helper::delete_data_image($product->image);
                $image = null;
            }
            if(is_file($request->image)) {
                if($product->image) {
                    Helper::delete_data_image($product->image);
                }
                $image = Helper::store_data_image($request->file('image'), $product->category_id);
            }
        }
        
        $product->title = $request->title;
        $product->title_ar = $request->title_ar;
        $product->price = $request->price;
        $product->image = isset($image) ? $image : $product->image;
        if(!$product->save()) {
            return redirect()->back()->with('error', 'Product could not be modified.');
        }
        else {
            return redirect('/dashboard/admin/databoard/addData/'.$product->category_id)->with('success', 'Product modified.');
        }

    }

    public function deleteProduct(Request $request) {
        if(isset($request->products)) {
            foreach($request->products as $current_product) {
                $product = Product::find($current_product);
                $fileurl = $product->image;
                $filepath = ltrim($fileurl, 'http://hawiya.net/');
                if(!$product) {
                    return redirect()->back()->with('error', 'Invalid Product ID');
                }
                if(!$product->delete()) {
                    return redirect()->back()->with('error', 'Product(s) could not be deleted.');
                }
                else {
                    @unlink($filepath);
                }
                
            }
            return redirect()->back()->with('success', 'Product(s) deleted.');
        }
    }

    public function addPackage(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'title_ar' => 'required',
            'category_id' => 'required',
            'old_price' => 'required',
            'new_price' => 'required'
        ]);
        $category = Category::find($request->category_id);
        if(!$category) {
            return redirect()->back()->with('error', 'Invalid Category');
        }
        $package = new Package;
        $package->title = $request->title;
        $package->title_ar = $request->title_ar;
        $package->category_id = $category->id;
        $package->category_name = $category->name;
        $package->old_price = $request->old_price;
        $package->new_price = $request->new_price;
        if($package->save()) {
            return redirect('/dashboard/admin/databoard/addData/'.$category->id)->back()->with('success', 'Package created.');
        }
        else {
            return redirect()->back()->with('error', 'Package could not be created.');
        }
    }

    public function editPackage(Request $request, $id) {
        // return $request;
        $package = Package::find($id);
        if(!$package) {
            return redirect()->back()->with('error', 'Invalid Package ID.');
        }
        if(!isset($request->title) || !isset($request->title_ar) || !isset($request->new_price) || !isset($request->old_price)) {
            return redirect()->back()->with('error', 'Required fields missing.');
        }
        if(isset($request->image)) {
            if($request->image === null) {
                Helper::delete_data_image($package->image);
                $image = null;
            }
            if(is_file($request->image)) {
                if($package->image) {
                    Helper::delete_data_image($package->image);
                }
                $image = Helper::store_data_image($request->file('image'), $package->category_id);
            }
        }
        
        $package->title = $request->title;
        $package->title_ar = $request->title_ar;
        $package->old_price = $request->old_price;
        $package->new_price = $request->new_price;
        // $package->image = isset($image) ? $image : $package->image;
        if(!$package->save()) {
            return redirect()->back()->with('error', 'Package could not be modified.');
        }
        else {
            return redirect('/dashboard/admin/databoard/addData/'.$package->category_id)->with('success', 'Package modified.');
        }
    }

    public function deletePackage(Request $request) {
        if(isset($request->packages)) {
            foreach($request->packages as $current_package) {
                $package = Package::find($current_package);
                // $fileurl = $product->image;
                // $filepath = ltrim($fileurl, 'http://hawiya.net/');
                if(!$package) {
                    return redirect()->back()->with('error', 'Invalid Package ID');
                }
                if(!$package->delete()) {
                    return redirect()->back()->with('error', 'Package(s) could not be deleted.');
                }
                else {
                    // @unlink($filepath);
                }
                
            }
            return redirect()->back()->with('success', 'Package(s) deleted.');
        }
    }


    public function editUser(Request $request, $id) {
        $user = User::find($id);
        if(!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        if(isset($request->designer)) {
            $user->designer = $request->designer; 
        }

        if(isset($request->admin)) {
            $user->admin = $request->admin; 
        }

        if(!$user->save()) {
            return redirect()->back()->with('error', 'User could not be modified.');
        }
        else {
            return redirect()->back()->with('success', 'User modified.');
        }
    }

    public function editOrder(Request $request) {
        // return "test";
        // return $request;
        $order = $this->getAllOrdersSortedByDate($request->category_id, $request->id);
        // return $order;
        if(!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }
        if(isset($request->designer_id)) {
            $order->designer_id = $request->designer_id; 
            $order->designer_name = User::find($request->designer_id)->name;
        }
        if(isset($request->days_left)) {
            $order->days_left = $request->days_left;
        }
        // return $order;
        if(!$order->save()) {
            return redirect()->back()->with('error', 'Order could not be modified.');
        }
        else {
            return redirect()->back()->with('success', 'Order updated');
        }
    }
}
