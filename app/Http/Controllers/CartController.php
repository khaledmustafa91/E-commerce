<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function calculateNumberofCartItems(){
        $user = User::find(Auth::user()->id);
        $userCarts = $user->cart;
        $numOfCartItems = count($userCarts);
        return $numOfCartItems;
    }
    function index(){
        //$cartItems = Cart::all()->where('user_id' , '=' , Auth::user()->id);
        $user = User::find(Auth::user()->id);
        $userCarts = $user->cart;
        $products = [];
        $subtotal = 0;
        $total = 0;
        foreach ($userCarts as $one){
            array_push($products , $one->product);
            $subtotal += $one->product->price * $one->quantity;
        }
        $total += ($subtotal*14)/100 + $subtotal;

        $numOfCartItems = $this->calculateNumberofCartItems();
        return view('cart', compact(['userCarts','products' , 'numOfCartItems','total','subtotal']));
    }

    function updateBill($productId){
        $product = Product::findOrFail($productId);
        return response($product->price,200);
    }

    function deleteCart($cartId){
        $cart = Cart::findOrFail($cartId);

        if($cart->delete()){
            return response('',200);
        }else{
            return response('Error' , 404);
        }

    }
}
