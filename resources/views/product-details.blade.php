@extends('templates.app')

@section('content')
        <!-- Product Details Area Start -->
        <div class="single-product-area section-padding-100 clearfix">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mt-50">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">{{$category->name}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">

                                    @for($i = 0 ; $i < count($product->photos_url) ; $i++)
                                    <li class="{{($i == 1) ? "active" : ""}}" data-target="#product_details_slider" data-slide-to="{{$i}}" style="background-image: url({{asset('img/product-img/'. $product->photos_url[$i])}});">
                                    </li>
                                    @endfor

{{--                                    <li data-target="#product_details_slider" data-slide-to="1" style="background-image: url(img/product-img/pro-big-2.jpg);">--}}
{{--                                    </li>--}}

{{--                                    <li data-target="#product_details_slider" data-slide-to="2" style="background-image: url(img/product-img/pro-big-3.jpg);">--}}
{{--                                    </li>--}}
{{--                                    <li data-target="#product_details_slider" data-slide-to="3" style="background-image: url(img/product-img/pro-big-4.jpg);">--}}
{{--                                    </li>--}}


                                </ol>


                                <div class="carousel-inner">


{{--                                    <div class="carousel-item active">--}}
{{--                                        <a class="gallery_img" href="img/product-img/pro-big-1.jpg">--}}
{{--                                            <img class="d-block w-100" src="img/product-img/pro-big-1.jpg" alt="First slide">--}}
{{--                                        </a>--}}
{{--                                    </div>--}}

                                    @for($i = 0 ; $i < count($product->photos_url) ; $i++)
                                    <div class="carousel-item {{($i == 1) ? "active" : ""}}">
                                        <a class="gallery_img" href="{{asset('img/product-img/'. $product->photos_url[$i])}}">
                                            <img class="d-block w-100" src="{{asset('img/product-img/'. $product->photos_url[$i])}}" alt="Second slide">
                                        </a>
                                    </div>
                                    @endfor



{{--                                    <div class="carousel-item">--}}
{{--                                        <a class="gallery_img" href="img/product-img/pro-big-3.jpg">--}}
{{--                                            <img class="d-block w-100" src="img/product-img/pro-big-3.jpg" alt="Third slide">--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                    <div class="carousel-item">--}}
{{--                                        <a class="gallery_img" href="img/product-img/pro-big-4.jpg">--}}
{{--                                            <img class="d-block w-100" src="img/product-img/pro-big-4.jpg" alt="Fourth slide">--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 col-lg-5">


                        <div class="single_product_desc">
                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price">$ {{$product->price}}</p>
                                <a href="">
                                    <h6>{{$product->name}}</h6>
                                </a>
                                <!-- Ratings & Review -->
                                <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                    <div class="ratings">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <div class="review">
                                        <a href="#">Write A Review</a>
                                    </div>
                                </div>
                                <!-- Avaiable -->
                                @if($product->stock == 1)
                                    <p class="avaibility"><i class="fa fa-circle"></i> In Stock</p>
                                @else
                                    <p class="unavailable"><i class="fa fa-circle"></i> Out of Stock</p>
                                @endif

                            </div>

                            <div class="short_overview my-5">
                                <p>{{$product->description}}</p>
                            </div>

                        @if($product->stock == 1)
                            <!-- Add to Cart Form -->
                            <form class="cart clearfix" method="post">
                                <div class="cart-btn d-flex mb-50">
                                    <p>Qty</p>
                                    <div class="quantity">
                                        <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                        <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="1">
                                        <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                                    </div>
                                </div>

                                <a onclick="addToCart({{$product->id}})" name="addtocart" value="5" class="btn amado-btn">Add to cart</a>
                            </form>
                        @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Details Area End -->
        <div class="alert alert-success successAlert" role="alert">
            Product added successfully to your cart
        </div>

        <div class="alert alert-danger DangerMessage" role="alert">
            something went wrong please try again or contact us
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

        @endsection
