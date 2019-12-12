<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\User;
use App\Profile;
use App\Upload;
use App\Product;
use App\Category;
use App\Package;

use App\Models\BusinessCard\BusinessCard; 
use App\Models\BusinessCard\BusinessCardColor;
use App\Models\BusinessCard\BusinessCardLabel;
use App\Models\BusinessCard\BusinessCardLabelColor;
use App\Models\BusinessCard\BusinessCardPrice;

use App\Models\Commercial\CommercialItem;
use App\Models\Commercial\CommercialOrder;

use App\Models\Personal\PersonalItem; 
use App\Models\Personal\PersonalSubitem;

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

    public function toggleAdmin(Request $request, $id, $type) {
        // return $request;
        if(!isset($id) || !isset($type)) {
            return redirect()->back()->with('error', 'Required fields missing.');
        }
        $user = User::find($id);
        switch($type) {
            case 'super_admin': 
                $user->admin = !$user->admin;
            break; 

            case 'printing_admin':
                $user->printing_admin = !$user->printing_admin;
            break;

            case 'designer': 
                $user->designer = !$user->designer;
            break;

            case 'store_admin': 
                $user->store_admin = !$user->store_admin; 
            break;

            case 'sales_admin': 
                $user->sales_admin = !$user->sales_admin; 
            break;

            default: return redirect()->back()->with('error', 'Invalid Admin Type.');

        }
        if(!$user->save()) {
            return redirect()->back()->with('error', 'Admin Status could not be changed.');
        }
        return redirect()->back()->with('success', 'Admin status changed successfully.');
    }

    public function toggleStar(Request $request, $id) {
        if(!isset($request->id)) {
            return redirect()->back()->with('error', 'Required fields missing.');
        }
        $user = User::find($request->id);
        if(!$user) {
            return redirect()->back()->with('error', 'Invalid User.');
        }
        $user->star = !$user->star;
        if(!$user->save()) {
            return redirect()->back()->with('error', 'User star status could not be toggled.');
        }
        return redirect()->back()->with('success', 'User star status toggled successfully.');
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
        if(is_file($request->image)) {
            $file = $request->file('image');
           $image = Helper::store_data_image($file, $request->category_id);
        }
        $package = new Package;
        $package->title = $request->title;
        $package->title_ar = $request->title_ar;
        $package->category_id = $category->id;
        $package->category_name = $category->name;
        $package->image = isset($image) ? $image : null;
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
        $package->image = isset($image) ? $image : $package->image;
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

    public function deleteBusinesscard(Request $request) {
        if(isset($request->cards)) {
            foreach($request->cards as $current_card) {
                $card = BusinessCard::find($current_card);
                if(!$card) {
                    //
                    continue;
                }
                if(!$card->delete()) {
                    return redirect()->back()->with('error', 'Business Card '.$card->id.' could not be deleted');
                }
                
            }
            return redirect()->back()->with('success', 'Business Card(s) deleted.');
        }
    }

    public function addBusinesscard(Request $request) {
        // return is_file($request->fronttextphoto) ? "yes" : "no";
        $this->validate($request, [
            'shape' => 'required|string',
            'price_with_cover' => 'required|numeric',
            'price_without_cover' => 'required|numeric',
            'fronttextphoto' => 'required|image',
            'frontbasephoto' => 'required|image',
            'backtextphoto' => 'required|image',
            'backbasephoto' => 'required|image'
        ]);
        $card = BusinessCard::create([
            'shape' => $request->shape,
            'fronttextphoto' => Helper::store_data_image($request->fronttextphoto),
            'frontbasephoto' => Helper::store_data_image($request->backbasephoto),
            'backtextphoto' => Helper::store_data_image($request->backtextphoto),
            'backbasephoto' => Helper::store_data_image($request->backbasephoto)
        ]);
        if($card) {
            $price = BusinessCardPrice::create([
                'business_card_id' => $card->id,
                'with_cover' => $request->price_with_cover,
                'without_cover' => $request->price_without_cover
            ]);
            if($price) {
                return redirect()->back()->with('success', 'Business Card created.');
            }
            else {
                return redirect()->back()->with('error', 'Business Card created, but prices could not be added.');
            }
        }
        else {
            return redirect()->back()->with('error', 'Business Card could not be created.');
        }
    }

    public function deleteBusinesscards(Request $request) {
        if(!isset($request->cards)) {
            return redirect()->back()->with('error', 'Required fields missing.');
        }
        if(!is_array($request->cards)) {
            return redirect()->back()->with('error', 'Required field is not an array.');
        }
        foreach($request->cards as $card_id) {
            if(!BusinessCard::find($card_id)->delete()) {
                return redirect()->back()->with('error', 'Business card '.$card_id.' could not be deleted.');
            }
        }
        return redirect()->back()->with('success', 'Selected Business cards deleted successfully.');

    }


    public function addBusinesscardLabel(Request $request, $id) {
        // foreach($request->colors as $key => $value) {
        //     echo $key." ".$value;
        //     echo BusinessCardColor::find($key);
        // }
        // return $request;

        $card = BusinessCard::find($id);
        if(!$card) {
            return redirect()->back()->with('error', 'Invalid Business Card.');
        }
        $request->validate([
            'x1' => 'required|numeric',
            'y1' => 'required|numeric',
            'x2' => 'required|numeric',
            'y2' => 'required|numeric',
            'font_name' => 'required|string',
            'font_weight' => 'required|string',
            'font_size' => 'required|numeric',
            'colors' => 'nullable|array'
        ]);
        $label = new BusinessCardLabel;
        $label->x1 = $request->x1;
        $label->y1 = $request->y1;
        $label->x2 = $request->x2;
        $label->y2 = $request->y2;
        $label->font_name = $request->font_name;
        $label->font_weight = $request->font_weight;
        $label->font_size = $request->font_size;
        if(!$card->labels()->save($label)) {
            return redirect()->back()->with('error', 'Label could not be created.');
        }
        if(isset($request->colors)) {
            foreach($request->colors as $key => $value) {
                $color = BusinessCardColor::find($key);
                if(!$color) {
                    $label->delete();
                    return redirect()->back()->with('error', 'Color '.$color->name.' not found. Label deleted to maintain consistency.');
                }
                $label->colors()->attach($color->id, ['color' => $value]);

                if(!$label->colors()->find($color->id)) {
                    $label->delete();
                    return redirect()->back()->with('error', 'Color '.$color->name.' could not be attached to Label. To maintain consistency, label was deleted.');
                }
            }
        }
        return redirect()->back()->with('success', 'Label created and Colors attached.');
        

    }

    public function deleteBusinesscardLabels(Request $request) {
        $this->validate($request, [
            'labels' => 'required|array'
        ]);
        foreach($request->labels as $label_id) {
            $label = BusinessCardLabel::find($label_id);
            if(!$label) {
                return redirect()->back()->with('error', 'Label ID '.$label->id.' does not exist.');
            }
            if(!$label->delete()) {
                return redirect()->back()->with('error', 'Label ID '.$label->id.' could not be deleted.');
            }
        }
        return redirect()->back()->with('success', 'Labels successfully deleted.');
    }

    public function addBusinesscardColor(Request $request, $id) {
        $card = BusinessCard::find($id);
        if(!$card) {
            return redirect()->back()->with('error', 'Business card does not exist.');
        }
        $this->validate($request, [
            'labels' => 'nullable|array',
            'color' => 'required|string',
            'preview_text_color' => 'nullable|string'
        ]);
        $color = new BusinessCardColor;
        $color->name = $request->color;
        $color->preview_text_color = $request->preview_text_color;
        if(!$card->colors()->save($color)) {
            return redirect()->back()->with('error', 'Color could not be created.');
        }
        if(isset($request->labels)) {
            foreach($request->labels as $key => $value) {
                $label = BusinessCardLabel::find($key);
                if(!$label) {
                    $color->delete();
                    return redirect()->back()->with('error', 'Label not found. Color deleted to restore consistency.');
                }
                $color->labels()->attach($label->id, ['color' => $value]);

                if(!$color->labels()->find($label->id)) {
                    $color->delete();
                    return redirect()->back()->with('error', 'Label could not be attached. Color deleted to maintain consistency.');
                }
            }
        }
        return redirect()->back()->with('success', 'Color created and Labels attached.');
    }

    public function deleteBusinesscardColor(Request $request, $id) {
        $color = BusinessCardColor::find($id);
        if(!$color) {
            return redirect()->back()->with('error', 'Color not found.');
        }
        if(!$color->delete()) {
            return redirect()->back()->with('error', 'Color could not be deleted.');
        }
        return redirect()->back()->with('success', 'Color deleted successfully.');
    }


    public function addCommercialItem(Request $request) {
        $this->validate($request, [
            'name' => 'required|string',
            'image' => 'required|image',
            'price' => 'required|numeric'
        ]);
        $item = new CommercialItem;
        $item->name = $request->name;
        $item->image = Helper::store_data_image($request->image);
        $item->price = $request->price;
        if(!$item->save()) {
            return redirect()->back()->with('error', 'Item could not be created.');
        }
        return redirect()->back()->with('success', 'Item created successfully.');
    }

    public function deleteCommercialItems(Request $request) {
        $this->validate($request, [
            'items' => 'required|array'
        ]);
        $items = $request->items;
        foreach($items as $item_id) {
            $item = CommercialItem::find($item_id);
            if(!$item) {
                return redirect()->back()->with('error', 'Item '.$item_id.' does not exist.');
            }
            if(!$item->delete()) {
                return redirect()->back()->with('error', 'Item '.$item_id.' could not be deleted.');
            }
            
        }
        return redirect()->back()->with('success', 'Items deleted.');
    }

    public function editCommercialOrder(Request $request, $id) {
        $order = CommercialOrder::find($id);
        if(!$order) {
            return redirect()->back()->with('error', 'Invalid Commercial Order.');
        }
        if(isset($request->printing_admin)) {
            $order->printing_admin_id = $request->printing_admin;
        }
        if(!$order->save()) {
            return redirect()->back()->with('error', 'Order could not be updated.');
        }
        return redirect()->back()->with('success', 'Order updated.');
    }

    public function addPersonalItem(Request $request) {
        $this->validate($request, [
            'name' => 'required|string',
            'image' => 'required|image'
        ]);

        $item = PersonalItem::create([
            'name' => $request->name, 
            'image' => Helper::store_data_image($request->image)
        ]);

        if($item) {
            return redirect()->back()->with('success', 'Personal Item created.');
        }
        else {
            return redirect()->back()->with('error', 'Personal Item could not be created.');
        }
    }

    public function deletePersonalItems(Request $request) {
        $this->validate($request, [
            'items' => 'required|array'
        ]);
        foreach($request->items as $item_id) {

            $item = PersonalItem::find($item_id);
            if(!$item) {
                return redirect()->back()->with('error', 'Item ID '.$item->id.' not valid. Item not found.');
            }
            if(!$item->delete()) {
                return redirect()->back()->with('error', 'Item ID '.$item->id.' could not be deleted.');
            }
        }
        return redirect()->back()->with('success', 'Personal Item(s) deleted.');
    }

    public function addPersonalSubitem(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required|string',
            'image' => 'required|image'
        ]);
        $item = PersonalItem::find($id);
        $subitem = new PersonalSubitem;
        $subitem->name = $request->name;
        $subitem->image = Helper::store_data_image($request->image);
        $subitem->item()->associate($item);
        if(!$subitem->save()) {
            return redirect()->back()->with('error', 'SubItem could not be created.');
        }
        else {
            return redirect()->back()->with('success', 'SubItem created successfully.');
        }
    }

    public function deletePersonalSubitems(Request $request) {
        $this->validate($request, [
            'subitems' => 'required|array'
        ]);
        foreach($request->subitems as $subitem_id) {
            $subitem = PersonalSubitem::find($subitem_id);
            if(!$subitem) {
                return redirect()->back()->with('error', 'Personal Subitem '.$subitem_id.' not found.');
            }
            if(!$subitem->delete()) {
                return redirect()-> back()->with('error', 'Personal Subitem '.$subitem->id.' could not be deleted.');
            }

        }
        return redirect()->back()->with('success', 'Personal Subitems deleted.');
    }



}


