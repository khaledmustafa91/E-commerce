@extends('templates.app')

@section('content')
    <div class="cart-table-area section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="completeDiv checkout_details_area mt-50 clearfix">

                        <div class="cart-title">
                            <h2>Checkout</h2>
                        </div>
                        <div class="text-center">
                            <img class="completeImg" src="{{asset('img/complete.png')}}">
                            <div class="completeText">
                                <h2>Thanks You For Your Order!</h2>
                                <p> Your order id is {{$orderId}} please save it for any problem with your order.<br>have a nice day</p>
                                <b id="date"> </b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
    <script src="{{asset('js/date.js')}}"></script>
@endsection

