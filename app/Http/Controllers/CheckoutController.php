<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Order;
use App\Models\Orderitem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isNull;

class CheckoutController extends Controller
{
    //
    function index(){
        $cartController = new CartController();
        $numOfCartItems = $cartController->calculateNumberofCartItems();

        $user = User::find(Auth::user()->id);
        $userCarts = $user->cart;
        $userAddress = $user->address;

        $products = [];
        $subtotal = 0;
        $total = 0;
        foreach ($userCarts as $one){
            array_push($products , $one->product);
            $subtotal += $one->product->price * $one->quantity;
        }
        $total += ($subtotal*14)/100 + $subtotal;

        return view('checkout' , compact(['numOfCartItems','userAddress' , 'total' , 'subtotal']));
    }
    function makeOrder(){
        $user = User::find(Auth::user()->id);
        $address = $user->address[0];
        $address->first_name = request()->get('first_name');
        $address->last_name = request()->get('last_name');
        $address->full_name = request()->get('first_name') . " " . request()->get('last_name');
        $address->address = request()->get('address');
        $address->country = request()->get('country');
        $address->city = request()->get('city');
        $address->postcode = request()->get('zipCode');

        $user->address()->save($address);


        $discount = Discount::find(1);

        $userCarts = $user->cart;

        $subtotal = 0;
        $total = 0;
        $products_ids = [];
        foreach ($userCarts as $one){
            $subtotal += $one->product->price * $one->quantity;
            array_push($products_ids, $one->product->id);
            $one->delete();
        }
        $total += ($subtotal*14)/100 + $subtotal;


        $order = new Order;
        $order->status = "pending";
        $order->amount = $total;
        $order->user()->associate($user);
        $order->address()->associate($address);
        $order->discount()->associate($discount);

        $order->save();


        for ($i = 0 ; $i < count($products_ids) ; $i++){
            $product_item = Product::find($products_ids[$i]);
            $order_item = new Orderitem;

            $order_item->order()->associate($order);
            $order_item->product()->associate($product_item);
            $order_item->quantity = $userCarts[$i]->quantity;

            $order_item->save();
        }
        return redirect('/checkout/' .$order->id);
    }
    function orderComplete($orderId){
        $cartController = new CartController();
        $numOfCartItems = $cartController->calculateNumberofCartItems();

        return view('orderComplete' , compact(['numOfCartItems','orderId']));
    }
}
