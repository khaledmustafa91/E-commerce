<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //
    function index(){
        $products = Product::all();
        $cartController = new CartController();
        $numOfCartItems = $cartController->calculateNumberofCartItems();

        return view('index' , compact(['numOfCartItems','products']));
    }
    function shop(){
        $products = Product::all();
        $categories = Category::all();
        $category = 0;
        $cartController = new CartController();
        $numOfCartItems = $cartController->calculateNumberofCartItems();

        return view('shop' , compact(['products','categories' ,'category','numOfCartItems']));
    }
    function category($category){
        $products = Product::with('category' , 'product')->where('category_id' , '=' , $category)->get();
        $categories = Category::all();
        $cartController = new CartController();
        $numOfCartItems = $cartController->calculateNumberofCartItems();

        return view('shop' , compact(['products','category' , 'categories','numOfCartItems']));
    }
    function productDetails($productId){
        $product = Product::findOrFail($productId);
        $category = $product->category;
        $cartController = new CartController();
        $numOfCartItems = $cartController->calculateNumberofCartItems();

        return view('product-details' , compact(['product','category','numOfCartItems']));
    }
}
