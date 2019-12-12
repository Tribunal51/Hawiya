<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\User;
use App\Profile;
use App\LogodesignOrder;
use App\Category;
use App\Package;
use App\Product;

use App\Models\BusinessCard\BusinessCard; 
use App\Models\BusinessCard\BusinessCardColor; 
use App\Models\BusinessCard\BusinessCardLabel;
use App\Models\BusinessCard\BusinessCardModel;
use App\Models\BusinessCard\BusinessCardLabelColor;

use App\Models\Commercial\CommercialItem;
use App\Models\Commercial\CommercialOrder;

use App\Models\Personal\PersonalItem;
use App\Models\Personal\PersonalSubitem;

use Illuminate\Support\Facades\URL;

use App\Helpers\AppHelper as Helper;

use App\Traits\GetOrders;

class PagesController extends Controller
{

    use GetOrders;

    public function __construct() {
        //return $this->middleware('auth');

        //return $this->middleware('auth',['except' => ['show','index']]);

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('welcome', ["authuser", Auth::user() ? Auth::user() : -1]);
    }

    public function dashboard() {
        return view('admin.dashboard');
    }

    public function userDashboard() {
        return view('home', ["authuser", Auth::user() ? Auth::user() : -1]);
    }

    public function users() {
        $users = User::all();
        return view('admin.users')->with('users', $users);
    }

    public function addProfile() {
        $profiles = Profile::all();
        //return redirect('AddProfilePage')->with('profiles', $profiles);
         return view('admin.addprofile')->with('profiles', $profiles);
    }

    public function editProfile(Request $request, $id) {
        $profile = Profile::find($id);
        return view('admin.editprofile')->with('profile', $profile);
    }

    public function databoard(Request $request) {
        $categories = Category::all();
        $category_links = [];
        foreach($categories as $category) {
            array_push($category_links, json_encode(array('name' => $category->name, 'link' => '/dashboard/admin/databoard/addData/'.$category->id)));
        }
        // return $category_links;
        
        return view('admin.design.databoard')->with(compact('category_links'));
    }

    public function addData(Request $request, $id) {
        $categories = Category::all();
        $category_links = [];
        foreach($categories as $category) {
            array_push($category_links, json_encode(array('name' => $category->name, 'link' => '/dashboard/admin/databoard/addData/'.$category->id)));
        }


        $category = Category::find($id);
        
        if(!$category) {
            return view('admin.design.databoard')->with('error', 'Invalid Category');
        }
        if($category->id <= 3) {
            $data = array('packages' => Package::where('category_id', '=', $category->id)->get(), 'category' => $category);

            return view('admin.design.addpackage', compact('data', 'category_links'));
        }
        else {
            $data = array('products' => Product::where('category_id', '=', $category->id)->get(), 'category' => $category);
            return view('admin.design.addproduct', compact('data', 'category_links'));
        }
    }

    public function editProduct(Request $request, $id) {
        $data = Product::find($id);
        if(!$data) {
            return redirect()->back()->with('error', 'Invalid Product ID.');
        }
        
        return view('admin.design.editproduct', compact('data'));
    }

    public function editPackage(Request $request, $id) {
        $data = Package::find($id); 
        if(!$data) {
            return redirect()->back()->with('error', 'Invalid Package ID');
        }
        return view('admin.design.editpackage', compact('data'));
    }

    public function payment(Request $request) {
        
        //session()->put('referralUrl','http://hawiya.net/test');
        // dd(session('referralUrl'));
        //$this->session('redirect') = URL::previous();
        return view('pages.payment');
        if((URL::previous() !== 'http://hawiya.net/design/logo-design/info') && (!auth()->user())) {
            return view('pages.payment');
        }
        else {
            return redirect('/');
            
        }
            
    }

    public function orderboard() {
        $orders = $this->getAllDesignOrdersSortedByDate();
        $categories = Category::all();
        $category_links = [];
        foreach($categories as $category) {
            array_push($category_links, json_encode(array('name' => $category->name, 'link' => '/dashboard/admin/orderboard/category/'.$category->id)));
        }
        return view('admin.design.orderboard')->with(compact('orders', 'category_links'));
    }

    public function categorizedOrders($id) {
        $category_orders = [];
        $orders = $this->getAllOrdersSortedByDate($id);
        
        $categories = Category::all();
        $category_links = [];
        foreach($categories as $current_category) {
            array_push($category_links, json_encode(array('name' => $current_category->name, 'link' => '/dashboard/admin/orderboard/category/'.$current_category->id)));
        }

        // return $orders;
        $category = Category::find($id);
        // return $orders;
        
        return view('admin.design.categoryorders', compact('orders', 'category', 'category_links'));
        
        
    }

    public function editOrder(Request $request) {
        // return $request;
        if(!isset($request->id) || !isset($request->category_id)) {
            return redirect()->back()->with('error', 'Required fields missing.');
        }

        $designers = User::where('designer','=', true)->get();
        
        //return is_numeric($request->id).' '.is_numeric($request->category_id);
        $order = $this->getAllDesignOrdersSortedByDate($request->category_id, $request->id);
        return view('admin.design.order', compact('order', 'designers'));
        
    }

    public function user($id) {
        $user = User::find($id);
        if(!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }
        $design_orders = $this->getUserOrdersforDesignSortedBydate($user->id);
        return view('admin.user', compact('user', 'design_orders'));
    }

    public function designerDashboard() {
        $user = Auth::guard()->user();
        $orders = $this->getAllOrdersSortedByDate(null, null, $user->id);
        return view('designer.dashboard', compact('orders'));
    }

    public function designerOrder(Request $request) {
        if(!isset($request->id) || !isset($request->category_id)) {
            return redirect()->back()->with('error', 'Order does not exist.');
        }
        $order = $this->getAllOrdersSortedByDate($request->category_id, $request->id);
        // $order->color = explode(",", $order->color);
        // $order->logotype = explode(",", $order->logotype);
        $user = User::find($order->user_id);
       
        return view('designer.order', compact('order', 'user'));
    }

    public function businesscards() {
        $cards = BusinessCard::with('price')->get();
        return view('admin.businesscard.addbusinesscard', compact('cards'));
    }

    public function businesscard($id) {
        $card = BusinessCard::with('price')->where('id', $id)->first();
        $card_colors = BusinessCard::with('colors', 'colors.labels')->where('id', $id)->first();
        $card_labels = BusinessCard::with('labels', 'labels.colors')->where('id', $id)->first();
        $label = new BusinessCardLabel;
        $label_columns = $label->getTableColumns();
        return view('admin.businesscard.businesscard', compact('card', 'card_colors', 'card_labels', 'label_columns'));
    }

    public function businesscardLabel($id) {
        $label = BusinessCardLabel::with('colors')->find($id);
        return view('admin.businesscard.label', compact('label'));
    }

    public function addBusinesscard() {
        
    }

    public function commercialItems() {
        $items = CommercialItem::all();
        return view('admin.commercial.items', compact('items'));
    }

    public function commercialItem($id) {
        $item = CommercialItem::find($id);
        if(!$item) {
            return redirect()->back()->with('error', 'Commercial Item not found.');
        }
        return view('admin.commercial.item', compact('item'));
    }

    public function printingDashboard() {
        $user = Auth::guard()->user();
        $orders = $this->getAllPrintingOrdersSortedByDate(null, null, $user->id);
        return view('printing.dashboard', compact('orders'));
    }

    public function report($id) {
        
    }

    public function orderConfirm(Request $request) {
        return view('pages.orderconfirm');
    }

    public function commercialOrderboard() {
        $orders = CommercialOrder::all();
        return view('admin.commercial.orderboard', compact('orders'));
    }

    public function commercialOrder($id) {
        $order = CommercialOrder::find($id);
        if(!$order) {
            return redirect()->back()->with('error', 'Commercial Order not found.');
        }
        $printing_admins = User::where('printing_admin', true)->get();
        return view('admin.commercial.order', compact('order', 'printing_admins'));
    }

    public function salesDashboard(Request $request) {
        $user = Auth::guard()->user();
        return view('sales.dashboard');
    }

    public function salesCreateUser() {
        return view('sales.adduser');
    }

    public function salesDisplayUsers() {
        $users = User::all();
        return view('sales.users', compact('users'));
    }

    public function salesDisplayUser(Request $request, $id) {
        $user = User::find($id);
        if(!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }
        return view('sales.user', compact('user'));
    }

    
    public function printingDisplayCommercialOrders(Request $request) {
        $user = Auth::user();
        $orders = CommercialOrder::where('printing_admin_id', $user->id)->get();
        return view('printing.commercial_orders', compact('orders'));
    }

    public function printingDisplayCommercialOrder(Request $request, $id) {
        $user = Auth::user();
        $order = CommercialOrder::find($id);
        return view('printing.commercial_order', compact('order'));
    }

    public function printingDisplayUser(Request $request, $id) {
        $user = User::find($id);
        if(!$user) {
            return redirect()->back()->with('error', 'Invalid User ID. User not found.');
        }
        return view('printing.user', compact('user'));
    }

    public function adminDisplayPersonalItems(Request $request) {
        $items = PersonalItem::with('subitems')->get();
        return view('admin.personal.items', compact('items'));
    }

    public function adminDisplayPersonalItem(Request $request, $id) {
        $item = PersonalItem::find($id);
        $subitems = PersonalSubitem::where('personal_item_id', $id)->get();
        if(!$item) {
            return redirect()->back()->with('error', 'Item not found.');
        }
        return view('admin.personal.item', compact('item', 'subitems'));
    }

    
}
