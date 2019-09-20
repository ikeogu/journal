<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Bio Research Journal</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{asset('js/custom.js')}}"></script>

</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
    <header class="header-area">

        <!-- Navbar Area -->
        <div class="mag-main-menu" id="sticker">
            <div class="classy-nav-container breakpoint-off">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="magNav">

                    <!-- Nav brand -->
                    <a href="index.html" class="nav-brand"><img src="img/core-img/logo.png" alt=""></a>

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
                                    <li><a href="/archives">Archive</a></li>
                                    <li><a href="{{route('cat')}}">Categories</a></li>
                                    
                                    <li><a href="/about">About</a></li>
                                    <li><a href="/contact">Contact</a></li>
                                    @if(Auth::check())
                                        @auth
                                            @if(Auth::user()->role_id==1)
                                                
                                                <li>    <a href="#" id="showProfile">
                                                        <figure id="profileImage" class="col-2"></figure>
                                                    </a></li>
                                                |
                                                <li><a href="{{route('logout')}}">Log Out</a></li>
                                            @elseif(Auth::user()->role_id==2)
                                                
                                                <li>    <a href="#" id="showProfile">
                                                        <figure id="profileImage" class="col-2"></figure>
                                                    </a></li>
                                                |<li><a href="{{route('logout')}}">Log Out</a></li>
                                            @endif
                                            
                                        @endauth
                                    @else
                                        <li> <a  href="{{ route('login') }}">Login</a>  </li>|
                                        
                                        @if (Route::has('register'))
                                            <li>  <a  href="{{ route('register') }}">Register</a></li>
                                        @endif
                                    @endif
                                  
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>
                        
                        <div class="top-meta-data d-flex align-items-center">
                            <!-- Top Search Area -->
                            <div class="top-search-area">
                                <form action="{{route('search')}}" method="post">
                                    @csrf
                                    <input type="text" name="q" id="topSearch"
                                        >
                                    <button type="submit" class="btn"><i class="fa fa-search"
                                            aria-hidden="true"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        @if(Auth::check())
        <div class="card" id="profile">
            <div class="card-header row" id="showProfile">
                <figure id="profileImage"></figure>
                <div class="name col-6">
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
        @endif
    </header>
        
    <main>
        @yield('content')
    </main>
    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="footer-widget">
                        <!-- Logo -->
                        <a href="index.html" class="foo-logo"><img src="" alt=""><h3 class="text-white">BIO Research</h3></a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>
                        <div class="footer-social-info">
                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                           
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
                                <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Biochemistry</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Education</a>
                                </li>
                                <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Computer Science</a>
                                </li>
                                <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Engineering</a>
                                </li>
                                <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Animal and Environmentals</a>
                                </li>
                              
                            </ul>
                        </nav>
                    </div>
                </div>

               

                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="footer-widget">
                        <h6 class="widget-title">Channels</h6>
                        <ul class="footer-tags">
                            <li><a href="#">Education</a></li>
                            <li><a href="#">Research</a></li>
                            <li><a href="#">Skill</a></li>
                            <li><a href="#">Project</a></li>
                            <li><a href="#">NEWS</a></li>
                            <li><a href="#">Discovery</a></li>
                            <li><a href="#">Commenteries</a></li>
                            <li><a href="#">More</a></li>
                            
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
                        <p class="copywrite-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright
                            <script>document.write(new Date().getFullYear());</script> &copy; Bio Research Journal<i class="fa fa-heart-o" aria-hidden="true"></i> by <a
                                href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                    <div class="col-12 col-sm-6">
                        <nav class="footer-nav">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><a href="/privacy">Privacy and policy</a></li>
                                <li><a href="/advert">Advertisement</a></li>
                                <li><a href="/contact">Contact Us</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="{{asset('js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('js/bootstrap/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script>
    <!-- All Plugins js -->
    <script src="{{asset('js/plugins/plugins.js')}}"></script>
    <!-- Active js -->
    <script src="{{asset('js/active.js')}}"></script>
    
    <script>
            $(document).ready(function(){
                setTimeout(function(){
                    $('#newsLatterSubsModal').modal('show');
                }, 15000);

                $('.email_subscribed').on('click', function(){

                    

                    var email = $('#subscribed_email').val();
                    var _token = $('input[name=_token]').val();
                    
                    if(validateEmail(email) == true){
                        $.ajax({
                            type: "POST",
                            url: "/newslattersubscribers",
                            data: "email="+email+"&_token="+_token,
                            cache: false,
                            async: false,
                            success: function(result) {
                                alert(result);
                                console.log(result);
                            },
                            error: function(result) {
                                alert("Error: "+result);
                                console.log(result);
                            }
                        });

                    }else{
                        alert('Please enter The email correctly');

                    }
                });
            });



            function validateEmail(email) {
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(email).toLowerCase());
            }

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