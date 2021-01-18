@extends('templates.app')
@section('content')

        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <form action="" method="post">
                    @csrf
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>Shopping Cart</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @for($i = 0 ; $i < count($products) ; $i++)
                                    <tr class="product{{$userCarts[$i]->id}}">
                                        <td class="cart_product_img">
                                            <a href="#"><img src="img/bg-img/cart1.jpg" alt="Product"></a>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5>{{$products[$i]->name}}</h5>
                                        </td>
                                        <td class="price">
                                            <span>${{$products[$i]->price}}</span>
                                        </td>
                                        <td class="qty">
                                            <div class="qty-btn d-flex">
                                                <p>Qty</p>
                                                <div class="quantity">
                                                    <span class="qty-minus" onclick="decreaseQuantity({{$products[$i]->id}})"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                    <input type="number" class="qty-text" id="qty{{$products[$i]->id}}" step="1" min="1" max="300" name="quantity[]" value="{{$userCarts[$i]->quantity}}">
                                                    <span class="qty-plus" onclick="increaseQuantity({{$products[$i]->id}})"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
{{--                                            <form method="post">--}}
{{--                                                @method('DELETE')--}}
{{--                                                @csrf--}}
                                                <a onclick="deleteFromCart({{$userCarts[$i]->id}})"> <i class="fa fa-remove delete"></i> </a>
{{--                                            </form>--}}
                                        </td>
                                    </tr>
                                    @endfor

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <li><span>subtotal:</span> <span class="subtotal">{{$subtotal}}<b>$</b></span></li>
                                <li><span>delivery:</span> <span>Free</span></li>
                                <li><span>total:</span> <span class="total">{{$total}}<b>$</b></span></li>
                            </ul>
                            <div class="cart-btn mt-100">
                                <button type="submit" href="#" class="btn amado-btn w-100">Checkout</button>
                            </div>
                        </div>
                    </div>
                </div>
    </form>
            </div>
        </div>

        <div class="alert alert-success successAlert" role="alert">
            Product was deleted from your cart
        </div>
        <div class="alert alert-danger DangerMessage" role="alert">
            something went wrong please try again or contact us
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
@endsection
