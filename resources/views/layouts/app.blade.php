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
                                    <li ><a href="{{route('publish.index')}}">Articles</a></li>

                                    <li><a href="{{route('archives.index')}}">Archive</a></li>

                                    <li><a href="/about">About</a></li>
                                    <li><a href="/contact">Contact</a></li>




                                        @guest
                                            <a  href="{{ route('login') }}">Login</a>  |

                                            @if (Route::has('register'))
                                                <a  href="{{ route('register') }}">Register</a>
                                            @endif
                                        @else
                                        @if(Auth::user()->role_id==1)
                                                <li>
                                                    <a href="#" id="showProfile">
                                                         <figure id="profileImage" class="col-2"></figure>
                                                    </a>
                                                </li> |
                                                <li><a href="{{route('logout')}}">Log Out</a></li>
                                        @elseif(Auth::user()->role_id==2)
                                                <li>
                                                    <a href="#" id="showProfile">
                                                        <figure id="profileImage" class="col-2"></figure>
                                                    </a>
                                                </li> |
                                                <li><a href="{{route('logout')}}">Log Out</a></li>
                                        @else
                                                <li><a href="#" id="showProfile">
                                                    <figure id="profileImage" class="col-2"></figure>
                                                    </a>
                                                </li>
                                                |
                                                <li><a href="{{route('logout')}}">Log Out</a></li>
                                        @endif
                                        @endguest

                                </ul>
                                @guest
                                @else
                                    <div class="card" id="profile">
                                        <div class="card-header row">
                                            <div id="profileImage"></div>
                                            <div class="name col-8">
                                                    <span id="firstName">{{Auth::user()->name}}</span>
                                                    <small>{{Auth::user()->email}}</small>
                                            </div>

                                        </div>
                                        <hr>
                                        <div class="card-body">
                                                @if(Auth::user()->role_id==1)
                                                    <div>
                                                        <a href="{{route('dash')}}">Admin Dasboard</a>
                                                    </div>
                                                @elseif(Auth::user()->role_id==2)
                                                <div>
                                                       <a href="#"> Editor Dasboard</a>
                                                </div>
                                                @endif

                                        </div>
                                    </div>
                                @endguest
                            </div>
                            <!-- Nav End -->
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script>
    <!-- All Plugins js -->

    <!-- Active js -->
    <script src="{{asset('js/active.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $(document).click(function() {
            $("#showProfile").click(function() {
                $("#profile").toggle();
            });
        });

        $(document).ready(function(){
            var firstName = $('#firstName').text();

            var intials = $('#firstName').text().charAt(0) + $('#firstName').text().charAt(1);
            var profileImage = $('#profileImage').text(intials);
        });

     </script>

</body>
</html>
