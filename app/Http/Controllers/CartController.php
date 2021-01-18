<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    function index(){
        //$cartItems = Cart::all()->where('user_id' , '=' , Auth::user()->id);
        $user = User::find(Auth::user()->id);
        $userCarts = $user->cart;
        $products = [];
        $subtotal = 0;
        $total = 0;
        foreach ($userCarts as $one){
            array_push($products , $one->product);
            $subtotal += $one->product->price;
        }
        $total += ($subtotal*14)/100 + $subtotal;

        $numOfCartItems = count($userCarts);
        return view('cart', compact(['userCarts','products' , 'numOfCartItems','total','subtotal']));
    }
    function updateBill($productId){
        $user = User::find(Auth::user()->id);
        $userCarts = $user->cart;
        $subtotal = 0;
        $total = 0;
        foreach ($userCarts as $one){
            array_push($products , $one->product);
            $subtotal += $one->product->price;
        }
        $total += ($subtotal*14)/100 + $subtotal;

    }
    function deleteCart($cartId){

    }
}
