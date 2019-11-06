<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Package;
use App\Product;
use App\Helpers\AppHelper as Helper;

class DataController extends Controller
{
    //

    public function addCategories(Request $request) {
        if(!is_array($request->categories)) {
            return -2;  // echo "Required fields missing.";
        }
        foreach($request->categories as $category) {
            $model = new Category;
            $model->name = $category;
            $model->save();
        }
        return 1;
    }

    public function getAllPackages() {
        return Package::all();
    }

    public function getPackage($id) {
        $package = Package::find($id);
        if($package) {
            return $package;
        }
        else {
            return -3;  // echo "Package of that ID not found.";
        }
    }

    public function getPackagesByCategory($id) {
        $category = Category::find($id);
        if(!$category) {
            return -3;  // echo "Category not found.";
        }
        $packages = Package::where('category_id', $id)->get();
        return $packages;
    }

    public function addPackage(Request $request) {
        if(!isset($request->title) || !isset($request->category_id) || !isset($request->old_price) || !isset($request->new_price)) {
            return -2;  // echo "Required fields missing.";
        }
        $category = Category::find($request->category_id);
        if(!$category) {
            return -3;  // echo "Category does not exist.";

        }
        $package = new Package;
        $package->title = $request->title;
        $package->category_id = $category->id;
        $package->old_price = $request->old_price;
        $package->new_price = $request->new_price;
        $package->category_name = $category->name;
        $package->posts = $request->posts;
        if(!$package->save()) {
            return -1;  // echo "Some error occured. Please investigate.";
        }
        else {
            return $package->id;
        }
    }



    public function getAllProducts() {
        return Product::all();
    }

    public function getProduct($id) {
        $product = Product::find($id);
        if(!$product) {
            return -3;  // echo "Product not found.";
        }
        else {
            return $product;
        }
    }

    public function getProductsByCategory($id) {
        $category = Category::find($id);
        if(!$category) {
            return -3;  // echo "Category not found.";
        }
        $products = Product::where('category_id', '=', $id)->get();
        return $products;
    }

    public function addProduct(Request $request) {
        if(!isset($request->title) || !isset($request->category_id) || !isset($request->price)) {
            return -2;  // echo "Required fields missing.";
        }
        $category = Category::find($request->category_id);
        if(!$category) {
            return -3;  // echo "Category not found.";
        }

        if(!is_numeric($request->category_id)) {
            return -4;  // echo "Category ID not an integer.";
        }

        if(isset($request->image) && !Helper::check_file($request->image)) {
            return -5;  // echo "Undefined Image Format."; 
        }

        

        $product = new Product;
        $product->title = $request->title;
        $product->category_id = $category->id;
        $product->category_name = $category->name; 
        $product->price = $request->price;
        
        switch($request->category_id) {
            case 4: $file_url = 'products/stationery/';
            break;

            case 5: $file_url = 'products/packaging/';
            break;

            default: $file_url = 'uploads/';
        }
        if(isset($request->image)) {
            $product->image = Helper::save_file($request->image, $file_url);
        }
        if(!$product->save()) {
            return -1;  // echo "Some error occured. Please investigate.";
        } 
        else {
            return $product->id;
        }
    }
}
