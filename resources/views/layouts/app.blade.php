<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BRJ') }}</title>

    <!-- Scripts -->
   

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/style.css')}} ">
   
</head>
<body>
         <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="spinner">
            <div class="double-bounce1"> <h4>Loading....</h4></div>
            <div class="double-bounce2"> <h4>Loading....</h4></div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Navbar Area -->
        <div class="mag-main-menu" id="sticker">
            <div class="classy-nav-container breakpoint-off  bg-transparent">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between " id="magNav">

                    <!-- Nav brand -->
                    
                    <h3> Bio Research Journal</h3>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Nav Content -->
                    <div class="nav-content d-flex align-items-center">
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li class="active"><a href="/">Home</a></li>
                                    <li><a href="archives/create">Archive</a></li>
                                                                        
                                    <li><a href="/about">About</a></li>
                                    <li><a href="/contact">Contact</a></li>
                                    @if (Route::has('login'))
                               
                                        @auth
                                            <a href="#"></a>
                                        @else
                                            <a  href="{{ route('login') }}">Login</a>  |

                                            @if (Route::has('register'))
                                                <a  href="{{ route('register') }}">Register</a>
                                            @endif
                                        @endauth
                           
                                    @endif

                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>

                        <div class="top-meta-data d-flex align-items-center">
                            <!-- Top Search Area -->
                            <div class="top-search-area">
                                <form action="#" method="post">
                                    <input type="search" name="top-search" id="topSearch" placeholder="Search and hit enter...">
                                    <button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </div>
                           
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
        <main class="py-4">
            @yield('content')
        </main>
        <footer class="footer-area">
            <div class="container">
                <div class="row">
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget">
                            <!-- Logo -->
                            <a href="index.html" class="foo-logo"><img src="img/core-img/logo2.png" alt=""></a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <div class="footer-social-info">
                                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                                <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                                <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget">
                            <h6 class="widget-title">Categories</h6>
                            <nav class="footer-widget-nav">
                                <ul>
                                    <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Life Style</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Tech</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Travel</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Music</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Foods</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Fashion</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Game</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Football</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Sports</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> TV Show</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget">
                            <h6 class="widget-title">Sport Videos</h6>
                            <!-- Single Blog Post -->
                            <div class="single-blog-post style-2 d-flex">
                                <div class="post-thumbnail">
                                    <img src="img/bg-img/12.jpg" alt="">
                                </div>
                                <div class="post-content">
                                    <a href="single-post.html" class="post-title">Take A Romantic Break In A Boutique Hotel</a>
                                    <div class="post-meta d-flex justify-content-between">
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 34</a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 84</a>
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Blog Post -->
                            <div class="single-blog-post style-2 d-flex">
                                <div class="post-thumbnail">
                                    <img src="img/bg-img/13.jpg" alt="">
                                </div>
                                <div class="post-content">
                                    <a href="single-post.html" class="post-title">Travel Prudently Luggage And Carry On</a>
                                    <div class="post-meta d-flex justify-content-between">
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 34</a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 84</a>
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget">
                            <h6 class="widget-title">Channels</h6>
                            <ul class="footer-tags">
                                <li><a href="#">Travel</a></li>
                                <li><a href="#">Fashionista</a></li>
                                <li><a href="#">Music</a></li>
                                <li><a href="#">DESIGN</a></li>
                                <li><a href="#">NEWS</a></li>
                                <li><a href="#">TRENDING</a></li>
                                <li><a href="#">VIDEO</a></li>
                                <li><a href="#">Game</a></li>
                                <li><a href="#">Sports</a></li>
                                <li><a href="#">Lifestyle</a></li>
                                <li><a href="#">Foods</a></li>
                                <li><a href="#">TV Show</a></li>
                                <li><a href="#">Twitter Video</a></li>
                                <li><a href="#">Playing</a></li>
                                <li><a href="#">clips</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Copywrite Area -->
             <div class="copywrite-area">
                <div class="container">
                    <div class="row">
                        <!-- Copywrite Text -->
                        <div class="col-12 col-sm-6">
                            <p class="copywrite-text"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy; All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <nav class="footer-nav">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Privacy</a></li>
                                    <li><a href="#">Advertisement</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    
    
    <!-- Popper js -->
    <script src="{{asset('js/bootstrap/popper.min.js')}}"></script>
    <script src="{{asset('js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script>
    <!-- All Plugins js -->
    
    <!-- Active js -->
    <script src="{{asset('js/active.js')}}"></script>
   
</body>
</html>