@extends('templates.app')

@section('content')
        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Checkout</h2>
                            </div>

                            <form action="#" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" name="first_name" class="form-control" id="first_name" value="{{( count($userAddress) > 0 ? $userAddress[0]->first_name : "")}}" placeholder="First Name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" name="last_name" class="form-control" id="last_name" value="{{( count($userAddress) > 0 ? $userAddress[0]->last_name : "")}}" placeholder="Last Name" required>
                                    </div>
{{--                                    <div class="col-12 mb-3">--}}
{{--                                        <input type="text" name="company" class="form-control" id="company" placeholder="Company Name" value="" >--}}
{{--                                    </div>--}}
{{--                                    <div class="col-12 mb-3">--}}
{{--                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="">--}}
{{--                                    </div>--}}
                                    <div class="col-12 mb-3">
                                        <select class="w-100" id="country" name="country">
                                        <option value="USA">United States</option>
                                        <option value="UK">United Kingdom</option>
                                        <option value="Germany">Germany</option>
                                        <option value="France">France</option>
                                        <option value="India">India</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="Canada">Canada</option>
                                    </select>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" name="address" class="form-control mb-3" id="street_address" placeholder="Address" value="{{( count($userAddress) > 0 ? $userAddress[0]->address : "")}}">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" name="city" class="form-control" id="city" placeholder="City" value="{{( count($userAddress) > 0 ? $userAddress[0]->city : "")}}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" name="zipCode" class="form-control" id="zipCode" placeholder="Zip Code" value="{{( count($userAddress) > 0 ? $userAddress[0]->postcode : "")}}">
                                    </div>
{{--                                    <div class="col-md-6 mb-3">--}}
{{--                                        <input type="number" name="phone" class="form-control" id="phone_number" min="0" placeholder="Phone No" value="">--}}
{{--                                    </div>--}}
                                    <div class="col-12 mb-3">
                                        <textarea name="comment" class="form-control w-100" id="comment" cols="30" rows="10" placeholder="Leave a comment about your order"></textarea>
                                    </div>

{{--                                    <div class="col-12">--}}
{{--                                        <div class="custom-control custom-checkbox d-block mb-2">--}}
{{--                                            <input type="checkbox" class="custom-control-input" id="customCheck2">--}}
{{--                                            <label class="custom-control-label" for="customCheck2">Create an accout</label>--}}
{{--                                        </div>--}}
{{--                                        <div class="custom-control custom-checkbox d-block">--}}
{{--                                            <input type="checkbox" class="custom-control-input" id="customCheck3">--}}
{{--                                            <label class="custom-control-label" for="customCheck3">Ship to a different address</label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>

                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <li><span>subtotal:</span> <span>{{$subtotal}}<b>$</b></span></li>
                                <li><span>delivery:</span> <span>Free</span></li>
                                <li><span>total:</span> <span>{{$total}}<b>$</b></span></li>
                            </ul>

                            <div class="payment-method">
                                <!-- Cash on delivery -->
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="cod" checked>
                                    <label class="custom-control-label" for="cod">Cash on Delivery</label>
                                </div>
                                <!-- Paypal -->
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="paypal">
                                    <label class="custom-control-label" for="paypal">Paypal <img class="ml-15" src="img/core-img/paypal.png" alt=""></label>
                                </div>
                            </div>

                            <div class="cart-btn mt-100">
                                <button type="submit" href="#" class="btn amado-btn w-100">Checkout</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
@endsection
