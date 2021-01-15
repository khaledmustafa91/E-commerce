<?php

use App\Models\Address;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Order;
use App\Models\Orderitem;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('index');
});
Route::get('/checkout' , function (){
    return view('checkout');
});
Route::post('/checkout' , function (){
    $user = User::find(Auth::user()->id);
    $address = new Address();
    $address->full_name = request()->get('first_name') . " " . request()->get('last_name');
    $address->address = request()->get('address');
    $address->country = request()->get('country');
    $address->city = request()->get('city');
    $address->postcode = request()->get('zipCode');

    $user->address()->save($address);

    return $user;
    dd(request()->get('address'));
});
Route::get('/order' , function (){
    $user = User::find(Auth::user()->id);
    $address = $user->address[0];
    $discount = Discount::find(1);

    $order = new Order;
    $order->status = "pending";
    $order->amount = 180;
    $order->user()->associate($user);
    $order->address()->associate($address);
    $order->discount()->associate($discount);

    $order->save();

    $products_ids = [1,2];
    for ($i = 0 ; $i < count($products_ids) ; $i++){
        $product_item = Product::find($products_ids[$i]);
        $order_item = new Orderitem;

        $order_item->order()->associate($order);
        $order_item->product()->associate($product_item);
        $order_item->quantity = 1;

        $order_item->save();
    }

    return $order->id;
});

Route::get('/product/insert' , function (){
    $category = Category::find(1);

    $product = new Product;
    $product->name = "Mobile";
    $product->price = 4150;
    $product->stock = true;
    $product->description = "this mobile has a lot of powerful things";
    $product->photos_url = json_encode(['5.jpg','6.jpg','7.jpg']);

    $category->product()->save($product);
    return $product;
});



Route::get('/cart' , function (){
    $user = User::find(Auth::user()->id);
    $product = Product::find(2);

    $cart = new Cart;
    $cart->quantity = 1;
    $cart->user()->associate($user);
    $cart->product()->associate($product);
    $cart->save();

    return $cart;
    return view('cart');
});

Route::get('/wishlist' , function (){
    $user = User::find(Auth::user()->id);
    $wishlist = new Wishlist;
    $user->wishlist()->save($wishlist);
});
Route::get('/add-to-wishlist' , function (){
    $user = User::find(Auth::user()->id);
    $product = Product::find(2);
    $wishlist = $user->wishlist;

    $product->wishlist()->save($wishlist);
    return $product;
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
