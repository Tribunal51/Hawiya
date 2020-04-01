<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Store\StoreProduct;
use App\Product;
use App\Helpers\AppHelper as Helper;
use App\Models\Store\StoreOrder;
use Validator;
use App\User;
use App\Category;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    //

    public function getProducts() {
        $products = Product::where('category_name', 'Store')->get();
        return $products;
    }

    public function createProduct(Request $request) {
        $this->validate($request, [
            'title' => 'required|string',
            'title_ar' => 'required|string',
            'price' => 'required|string',
            'image' => 'required|image'
        ]);
        $product = new Product;
        $product->title = $request->title;
        $product->title_ar = $request->title_ar; 
        $product->price = $request->price;
        $product->image = Helper::store_data_image($request->image);
        if(!$product->save()) {
            return redirect()->back()->with('error', 'Product could not be saved.');
        }
        return redirect()->back()->with('success', 'Product created.');
    }

    public function deleteProducts(Request $request) {
        $this->validate($request, [
            'products' => 'array',
            'products.*' => 'numeric'
        ]);
        foreach($request->products as $product_id) {
            $product = Product::find($product_id);
            if(!$product) {
                return redirect()->back()->with('error', 'Product ID '.$product_id.' not found.');
            }
            if(!$product->delete()) {
                return redirect()->back()->with('error', 'Product ID '.$product_id.' could not be deleted.');
            }
            return redirect()->back()->with('success', 'Product(s) deleted.');
        }
    }

    public function productsPage(Request $request) {
        $products = Product::where('category_name', 'Store')->get();
        return view('admin.store.products', compact('products'));
    }

    public function createProductPage(Request $request) {
        return view('admin.store.addproduct');
    }

    public function productPage(Request $request, $id) {
        $product = Product::find($id);
        if(!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }
        return view('admin.store.product', compact('product'));
    }

    public function editProductPage(Request $request, $id) {
        $product = Product::find($id);
        if(!$product) {
            return redirect()->back()->with('error', 'Product ID .'.$product->id.' not found.');
        }
        return view('admin.store.editproduct', compact('product'));
    }

    public function editProduct(Request $request, $id) {
        // return $request;
        $product = Product::find($id);
        if(!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }
        $this->validate($request, [
            'title' => 'required|string',
            'title_ar' => 'required|string',
            'price' => 'required|string',
            'changeImage' => 'nullable|string',
            'image' => 'nullable|image'
        ]);
        $product->title = $request->title;
        $product->title_ar = $request->title_ar;
        $product->price = $request->price; 
        if($request->changeImage) {
            $product->image = Helper::replace_data_image($request->image, $product->image);
        }
        if(!$product->save()) {
            return redirect()->back()->with('error', 'Product could not be modified.');
        }
        return redirect()->back()->with('success', 'Product modified successfully.');
    }


    public function getOrders() {
        $orders = StoreOrder::all();
        return $orders;
    }

    public function createOrder(Request $request) {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'products' => 'required|array',
            'products.*.title' => 'required|string',
            'products.*.size' => 'required|string',
            'products.*.quantity' => 'required|numeric',
            'comment' => 'nullable|string',
            'price' => 'nullable|string'
        ], [
            'required' => -2,
            'products.*.title.string' => -4,
            'products.*.size.string' => -5,
            'products.*.quantity.numeric' => -6,
            'comment.string' => -7, 
            'price.string' => -8
        ]);
        if($validator->fails()) {
            return $validator->errors()->first();
        }
        $user = User::find($request->user_id);
        if(!$user) {
            return -3;  // echo "User not found.";
        }

        $category = Category::where('name', 'Store')->first();
        
        $order = new StoreOrder; 

        $order->category_id = $category->id; 
        $order->order_token = $category->token_prefix.$order->getNextId();
        $order->user_id = $request->user_id; 
        $products = array();
        foreach($request->products as $product) {
            $new_product = (object)array('title' => $product['title'], 'size' => $product['size'], 'quantity' => $product['quantity']);
            array_push($products, $new_product);
        }
        // $order->products = $request->products;
        $order->products = $products; 
        $order->comment = $request->comment;
        $order->price = $request->price;


        if(!$order->save()) {
            return -1;  // echo "Error has occurred. Could not create Order. 
        }
        return $order->id;

    }

    public function updateOrder(Request $request, $id) {
        // return $request;
        $order = StoreOrder::find($id); 
        if(!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }
        $this->validate($request, [
            'store_admin_id' => 'nullable|numeric',
            'delivery_date' => 'nullable|date'
        ]);
        if($request->store_admin_id) {
            $user = User::find($request->store_admin_id);
            if(!$user) {
                return redirect()->back()->with('error', 'Store Admin user not found.');
            }
            if(!$user->store_admin) {
                return redirect()->back()->with('error', 'User not a Store Admin.');
            }
            $order->store_admin_id = $request->store_admin_id;
            $order->store_admin_name = $user->name;
        }
        if($request->delivery_date) {
            $order->delivery_date = $request->delivery_date;
        }

        if(!$order->save()) {
            return redirect()->back()->with('error', 'Order could not be updated.');
        }
        return redirect()->back()->with('success', 'Order updated successfully.');
    }

    public function superAdminStoreOrdersPage(Request $request) {
        $orders = StoreOrder::all();
        return view('admin.store.orders', compact('orders'));
    }

    public function superAdminStoreOrderPage(Request $request, $id) {
        $order = StoreOrder::find($id);
        $admins = User::where('store_admin', true)->get();
        // return $admins;
        if(!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }
        return view('admin.store.order', compact('order', 'admins'));
    }

    public function superAdminModifyStoreOrderPage(Request $request, $id) {
        $order = StoreOrder::find($id);
        if(!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }
        return view('admin.store.editorder', compact('order'));
    }

    public function storeDashboard(Request $request) {
        return view('store.dashboard');
    }


    public function storeAdminStoreOrdersPage(Request $request) {
        $orders = StoreOrder::all();
        return view('store.orders', compact('orders'));
    }

    public function storeAdminStoreOrderPage(Request $request, $id) {
        $order = StoreOrder::find($id);
        if(!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }
        return view('store.order', compact('order'));
    }

    public function storeAdminModifyStoreOrderPage(Request $request, $id) {
        $order = StoreOrder::find($id);
        if(!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }
        return view('store.editorder', compact('order'));
    }

    
}
