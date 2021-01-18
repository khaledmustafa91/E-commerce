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
        return view('index' , compact('products'));
    }
    function shop(){
        $products = Product::all();
        $categories = Category::all();
        $category = 0;
        $user = User::find(Auth::user()->id);
        $user = $user->cart;
        $numOfCartItems = count($user);
        return view('shop' , compact(['products','categories' ,'category','numOfCartItems']));
    }
    function category($category){
        $products = Product::with('category' , 'product')->where('category_id' , '=' , $category)->get();
        $categories = Category::all();
        $user = User::find(Auth::user()->id);
        $user = $user->cart;
        $numOfCartItems = count($user);
        return view('shop' , compact(['products','category' , 'categories','numOfCartItems']));
    }
}
