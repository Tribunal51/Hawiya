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
        
        return view('admin.databoard')->with(compact('category_links'));
    }

    public function addData(Request $request, $id) {
        $categories = Category::all();
        $category_links = [];
        foreach($categories as $category) {
            array_push($category_links, json_encode(array('name' => $category->name, 'link' => '/dashboard/admin/databoard/addData/'.$category->id)));
        }


        $category = Category::find($id);
        
        if(!$category) {
            return view('admin.databoard')->with('error', 'Invalid Category');
        }
        if($category->id <= 3) {
            $data = array('packages' => Package::where('category_id', '=', $category->id)->get(), 'category' => $category);

            return view('admin.addpackage', compact('data', 'category_links'));
        }
        else {
            $data = array('products' => Product::where('category_id', '=', $category->id)->get(), 'category' => $category);
            return view('admin.addproduct', compact('data', 'category_links'));
        }
    }

    public function editProduct(Request $request, $id) {
        $data = Product::find($id);
        if(!$data) {
            return redirect()->back()->with('error', 'Invalid Product ID.');
        }
        
        return view('admin.editproduct', compact('data'));
    }

    public function editPackage(Request $request, $id) {
        $data = Package::find($id); 
        if(!$data) {
            return redirect()->back()->with('error', 'Invalid Package ID');
        }
        return view('admin.editpackage', compact('data'));
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
        $orders = $this->getAllOrdersSortedByDate();
        $categories = Category::all();
        $category_links = [];
        foreach($categories as $category) {
            array_push($category_links, json_encode(array('name' => $category->name, 'link' => '/dashboard/admin/orderboard/category/'.$category->id)));
        }
        return view('admin.orderboard')->with(compact('orders', 'category_links'));
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
        
        return view('admin.categoryorders', compact('orders', 'category', 'category_links'));
        
        
    }

    public function editOrder(Request $request) {
        // return $request;
        if(!isset($request->id) || !isset($request->category_id)) {
            return redirect()->back()->with('error', 'Required fields missing.');
        }

        $designers = User::where('designer','=', true)->get();
        
        //return is_numeric($request->id).' '.is_numeric($request->category_id);
        $order = $this->getAllOrdersSortedByDate($request->category_id, $request->id);
        return view('admin.order', compact('order', 'designers'));
        
    }

    public function user($id) {
        $user = User::find($id);
        if(!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }
        $orders = $this->getUserOrdersSortedByDate($user->id);
        return view('admin.user', compact('user', 'orders'));
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

    public function report($id) {
        
    }

    public function orderConfirm(Request $request) {
        return view('pages.orderconfirm');
    }

    

    
}
