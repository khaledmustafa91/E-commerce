<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OperationController extends Controller
{
    //
    function addToCart($productID){

        $cart = new Cart; // initialize a cart object to save it to database
        $cartItems = \request('cartItems'); // get the cart items from ajax request

        $user = User::find(Auth::user()->id); // find current user
        $lastCarts =  $user->cart->where('product_id' ,'=' , $productID);

        if(count($lastCarts) == 0) {
            $product = Product::find($productID); // find the specific product return from front end

            $cart->quantity = $cartItems; // set value by value sent by ajax request
            $cart->user()->associate($user);
            $cart->product()->associate($product);

            if ($cart->save()) {
                return response('', 200); // if cart item inserted successfully return 200 OK
            } else {
                return response('error', 404); // if not return 404 error
            }
        }else{
            return response('added before',200);
        }
    }

    function finalizeCart(){
        $cart = new Cart; // initialize a cart object to save it to database
        $user = User::find(Auth::user()->id); // find current user
        $cartItems = $user->cart;
        $quantities =  \request('quantity');
        $subtotal = 0;
        $total = 0;
        for($i = 0 ; $i < count($cartItems) ; $i++){
            $cartItems[$i]->quantity = $quantities[$i];
            $cartItems[$i]->save();
            $subtotal += $cartItems[$i]->product->price * $cartItems[$i]->quantity;
        }
        $total += ($subtotal*14)/100 + $subtotal;
        return redirect('/checkout')->with(['subtotal' => $subtotal , 'total' => $total]);
        //return \request('quantity');
    }

    function addToWishlist($productID){

        $user = User::find(Auth::user()->id); // find current user
        $lastCarts =  $user->wishlist->where('product_id' ,'=' , $productID);

        if(count($lastCarts) == 0) {
            $product = Product::find($productID); // find the specific product return from front end

            $wishlist = $user->wishlist;


            if ($product->wishlist()->save($wishlist)) {
                return response('', 200); // if cart item inserted successfully return 200 OK
            } else {
                return response('error', 404); // if not return 404 error
            }
        }else{
            return response('added before',200);
        }
    }

}
