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

        if(Auth::check()) {
            $user = User::find(Auth::user()->id);
            $userCarts = $user->cart;
            $numOfCartItems = count($userCarts);
        }
        else{
            $numOfCartItems = 0;
        }
        return $numOfCartItems;
    }
    function index(){
        //$cartItems = Cart::all()->where('user_id' , '=' , Auth::user()->id);
        $userCarts = [];
        if(Auth::check()) {
            $user = User::find(Auth::user()->id);
            $userCarts = $user->cart;
        }
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
        $user = User::find(Auth::user()->id);
        $userCarts = $user->cart->where('product_id' , '=' , $productId);

        $operation = \request('operation');
        if($operation == 'plus') {
            $userCarts->first()->quantity += 1 ;
        }else{
            $userCarts->first()->quantity -= 1 ;
        }
        $userCarts->first()->save();
        return response($product->price,200);
    }

    function deleteCart($cartId){
        $cart = Cart::findOrFail($cartId);
        $product = Product::findOrFail($cart->product_id);
        if($cart->delete()){
            return response($product->price,200);
        }else{
            return response('Error' , 404);
        }

    }
}
