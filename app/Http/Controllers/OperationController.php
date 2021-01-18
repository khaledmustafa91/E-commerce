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

        $user = User::find(Auth::user()->id); // find current user
        $lastCarts =  $user->cart->where('product_id' ,'=' , $productID);

        if(count($lastCarts) == 0) {
            $product = Product::find($productID); // find the specific product return from front end

            $cart->quantity = 1; // set value by default 1
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
}
