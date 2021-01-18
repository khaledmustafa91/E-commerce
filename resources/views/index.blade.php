@extends('templates.app')

@section('content')
    <!-- Search Wrapper Area Start -->

    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="img/core-img/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="{{asset('index.blade.php')}}"><img src="{{asset('img/core-img/logo.png')}}" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
                <a href="{{asset('index.blade.php')}}"><img src="{{asset('img/core-img/logo.png')}}" alt=""></a>
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                    <li class="active"><a href="index.blade.php">Home</a></li>
                    <li><a href="shop.html">Shop</a></li>
                    <li><a href="product-details.html">Product</a></li>
                    <li><a href="cart.html">Cart</a></li>
                    <li><a href="checkout.html">Checkout</a></li>
                </ul>
            </nav>
            <!-- Button Group -->
            <div class="amado-btn-group mt-30 mb-100">
                @guest
                    @if (Route::has('login'))
                        <a class="btn amado-btn mb-15" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @endif
                    @if (Route::has('register'))
                        <a class="btn amado-btn active" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </div>
            <!-- Cart Menu -->
            <div class="cart-fav-search mb-100">
                <a href="cart.html" class="cart-nav"><img src="img/core-img/cart.png" alt=""> Cart <span>(0)</span></a>
                <a href="#" class="fav-nav"><img src="img/core-img/favorites.png" alt=""> Favourite</a>
                <a href="#" class="search-nav"><img src="img/core-img/search.png" alt=""> Search</a>
            </div>
            <!-- Social Button -->
            <div class="social-info d-flex justify-content-between">
                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>
        <!-- Header Area End -->

        <!-- Product Catagories Area Start -->
        <div class="products-catagories-area clearfix">
            <div class="amado-pro-catagory clearfix">

                @foreach($products as $product)
                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="/shop">
                        <img src="img/product-img/{{ $product->photos_url[0] }}" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>From $ {{$product->price}}</p>
                            <h4>{{$product->name}}</h4>
                        </div>
                    </a>
                </div>
                @endforeach

                <!-- Single Catagory -->
{{--                <div class="single-products-catagory clearfix">--}}
{{--                    <a href="shop.html">--}}
{{--                        <img src="img/bg-img/2.jpg" alt="">--}}
{{--                        <!-- Hover Content -->--}}
{{--                        <div class="hover-content">--}}
{{--                            <div class="line"></div>--}}
{{--                            <p>From $180</p>--}}
{{--                            <h4>Minimalistic Plant Pot</h4>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}

{{--                <!-- Single Catagory -->--}}
{{--                <div class="single-products-catagory clearfix">--}}
{{--                    <a href="shop.html">--}}
{{--                        <img src="img/bg-img/3.jpg" alt="">--}}
{{--                        <!-- Hover Content -->--}}
{{--                        <div class="hover-content">--}}
{{--                            <div class="line"></div>--}}
{{--                            <p>From $180</p>--}}
{{--                            <h4>Modern Chair</h4>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}

{{--                <!-- Single Catagory -->--}}
{{--                <div class="single-products-catagory clearfix">--}}
{{--                    <a href="shop.html">--}}
{{--                        <img src="img/bg-img/4.jpg" alt="">--}}
{{--                        <!-- Hover Content -->--}}
{{--                        <div class="hover-content">--}}
{{--                            <div class="line"></div>--}}
{{--                            <p>From $180</p>--}}
{{--                            <h4>Night Stand</h4>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}

{{--                <!-- Single Catagory -->--}}
{{--                <div class="single-products-catagory clearfix">--}}
{{--                    <a href="shop.html">--}}
{{--                        <img src="img/bg-img/5.jpg" alt="">--}}
{{--                        <!-- Hover Content -->--}}
{{--                        <div class="hover-content">--}}
{{--                            <div class="line"></div>--}}
{{--                            <p>From $18</p>--}}
{{--                            <h4>Plant Pot</h4>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}

{{--                <!-- Single Catagory -->--}}
{{--                <div class="single-products-catagory clearfix">--}}
{{--                    <a href="shop.html">--}}
{{--                        <img src="img/bg-img/6.jpg" alt="">--}}
{{--                        <!-- Hover Content -->--}}
{{--                        <div class="hover-content">--}}
{{--                            <div class="line"></div>--}}
{{--                            <p>From $320</p>--}}
{{--                            <h4>Small Table</h4>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}

{{--                <!-- Single Catagory -->--}}
{{--                <div class="single-products-catagory clearfix">--}}
{{--                    <a href="shop.html">--}}
{{--                        <img src="img/bg-img/7.jpg" alt="">--}}
{{--                        <!-- Hover Content -->--}}
{{--                        <div class="hover-content">--}}
{{--                            <div class="line"></div>--}}
{{--                            <p>From $318</p>--}}
{{--                            <h4>Metallic Chair</h4>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}

{{--                <!-- Single Catagory -->--}}
{{--                <div class="single-products-catagory clearfix">--}}
{{--                    <a href="shop.html">--}}
{{--                        <img src="img/bg-img/8.jpg" alt="">--}}
{{--                        <!-- Hover Content -->--}}
{{--                        <div class="hover-content">--}}
{{--                            <div class="line"></div>--}}
{{--                            <p>From $318</p>--}}
{{--                            <h4>Modern Rocking Chair</h4>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}

{{--                <!-- Single Catagory -->--}}
{{--                <div class="single-products-catagory clearfix">--}}
{{--                    <a href="shop.html">--}}
{{--                        <img src="img/bg-img/9.jpg" alt="">--}}
{{--                        <!-- Hover Content -->--}}
{{--                        <div class="hover-content">--}}
{{--                            <div class="line"></div>--}}
{{--                            <p>From $318</p>--}}
{{--                            <h4>Home Deco</h4>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
            </div>
        </div>
        <!-- Product Catagories Area End -->
    </div>

    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->
    <section class="newsletter-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">
                <!-- Newsletter Text -->
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="newsletter-text mb-100">
                        <h2>Subscribe for a <span>25% Discount</span></h2>
                        <p>Nulla ac convallis lorem, eget euismod nisl. Donec in libero sit amet mi vulputate consectetur. Donec auctor interdum purus, ac finibus massa bibendum nec.</p>
                    </div>
                </div>
                <!-- Newsletter Form -->
                <div class="col-12 col-lg-6 col-xl-5">
                    <div class="newsletter-form mb-100">
                        <form action="#" method="post">
                            <input type="email" name="email" class="nl-email" placeholder="Your E-mail">
                            <input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Newsletter Area End ##### -->
@endsection

