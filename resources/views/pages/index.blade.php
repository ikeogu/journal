@extends('layouts.app')
@section('content')
    
<div class="hero-area owl-carousel">
    <!-- Single Blog Post -->
    <div class="hero-blog-post bg-img bg-overlay" style="background-image: url(img/bg-img/1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <!-- Post Contetnt -->
                    <div class="post-content text-center">
                        <div class="post-meta" data-animation="fadeInUp" data-delay="100ms">
                            <a href="#">MAY 8, 2018</a>
                            <a href="archive.html">lifestyle</a>
                        </div>
                        <a href="video-post.html" class="post-title" data-animation="fadeInUp"
                            data-delay="300ms">Party Jokes Startling But Unnecessary</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Single Blog Post -->
    <div class="hero-blog-post bg-img bg-overlay" style="background-image: url(img/bg-img/2.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <!-- Post Contetnt -->
                    <div class="post-content text-center">
                        <div class="post-meta" data-animation="fadeInUp" data-delay="100ms">
                            <a href="#">MAY 8, 2018</a>
                            <a href="archive.html">lifestyle</a>
                        </div>
                        <a href="video-post.html" class="post-title" data-animation="fadeInUp"
                            data-delay="300ms">Party Jokes Startling But Unnecessary</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Hero Area End ##### -->

<!-- ##### Mag Posts Area Start ##### -->
<section class="mag-posts-area d-flex flex-wrap">

    <!-- >>>>>>>>>>>>>>>>>>>>
     Post Left Sidebar Area
    <<<<<<<<<<<<<<<<<<<<< -->
    <div class="post-sidebar-area left-sidebar mt-30 mb-30">
        <!-- Sidebar Widget -->
       @include('partials.sidebar')

        <!-- Sidebar Widget -->
        <div class="single-sidebar-widget">
            <a href="#" class="add-img"><img src="img/bg-img/add.png" alt=""></a>
        </div>
        <hr>

        <div class="section-heading mt-5">
            <h6>Accesseries</h6>
        </div>
        <div class="single-sidebar-widget">
            <div class="container">
                <div class="card p-5 box-shadow my-5">
                    <a href="{{route('cat')}}" class="btn mag-btn w-100">Submit Article</a>
                </div>

                <div class="card p-5 box-shadow my-5">
                    <a href="#" class="btn mag-btn w-100">Plagiarism test</a>
                </div>

                <div class="card p-5 box-shadow my-5">
                    <a href="#" class="btn mag-btn w-100">Call for papers</a>
                </div>
            </div>
        </div>

    </div>

    <!-- >>>>>>>>>>>>>>>>>>>>
         Main Posts Area
    <<<<<<<<<<<<<<<<<<<<< -->
    <div class="mag-posts-content mt-30 mb-30 p-30 box-shadow">
        <!-- Trending Now Posts Area -->
        <div class="trending-now-posts mb-30">
            <!-- Section Title -->
            <div class="section-heading">
                <h6>BIO RESEARCH JOURNAL</h6>
            </div>

            <div class="container">
                <h5>About Us</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta nemo minima nihil repellendus
                    soluta dolor. Doloribus aliquam sint repellat unde? Ullam possimus consequatur provident
                    delectus enim harum, numquam labore, dolores neque eveniet, quis impedit sit facilis? Tempore
                    dolorem atque deserunt est illo natus qui in nulla suscipit rerum aliquid expedita nostrum a,
                    cupiditate tenetur mollitia quod ipsam incidunt ut nam impedit illum odit saepe. Doloremque
                    ratione vero fugiat iste veniam? Eum reprehenderit dignissimos facere repellendus quae repellat
                    laborum cum quisquam minima quas ipsam, alias tempora molestiae quos quia excepturi inventore
                    explicabo possimus ut modi nihil recusandae ullam exercitationem? Magnam, expedita.</p>
                <a href="/about" class="btn mag-btn">Learn more...</a>
            </div>
            <hr>
            <div class="section-heading">
                <h6>Resources are made for...</h6>
            </div>

            <div class="trending-post-slides owl-carousel">
                <!-- Single Trending Post -->
                <div class="single-trending-post">
                    <img src="img/bg-img/19.jpg" alt="">
                    <div class="post-content">
                        <a href="#" class="post-cata"><b>Readers</b></a>
                        <a href="{{route('publish.index')}}" class="post-title">Big Savings On Gas While You Travel</a>
                    </div>
                </div>

                <!-- Single Trending Post -->
                <div class="single-trending-post">
                    <img src="img/bg-img/20.jpg" alt="">
                    <div class="post-content">
                        <a href="#" class="post-cata"><b>Researchers</b></a>
                        <a href="{{route('publish.index')}}" class="post-title">A Guide To Rocky Mountain Vacations</a>
                    </div>
                </div>

                <!-- Single Trending Post -->
                <div class="single-trending-post">
                    <img src="img/bg-img/21.jpg" alt="">
                    <div class="post-content">
                        <a href="#" class="post-cata"><b>Students</b></a>
                        <a href="{{route('publish.index')}}" class="post-title">The Health Benefits Of Sunglasses</a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container-fluid mt-5">
                <div class="row">
                    <div class="col-sm col-md-6">
                        <div class="card my-4">
                            <div class="section-heading p-2">
                                <h6>Latest on biology</h6>
                            </div>
                            <div class="card-body">
                                <h6>MAY 8, 2018 lifestyle</h6>
                                <h5>From Wetlands To Canals And Dams Amsterdam Is Alive</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut officiis tenetur
                                    beatae animi rem earum esse expedita ducimus placeat nesciunt!</p>
                                    
                            </div>
                            <a href="" class="btn mag-btn m-2">Read more...</a>
                        </div>
                    </div>
                    <div class="col-sm col-md-6">
                        <div class="card my-4">
                            <div class="section-heading p-2">
                                <h6>latest on Biochemistry</h6>
                            </div>
                            <div class="card-body">
                                <h6>MAY 8, 2018 lifestyle</h6>
                                <h5>From Wetlands To Canals And Dams Amsterdam Is Alive</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut officiis tenetur
                                    beatae animi rem earum esse expedita ducimus placeat nesciunt!</p>
                            
                            </div>
                            <a href="" class="btn mag-btn m-2">Read more...</a>
                        </div>
                    </div>
                    <div class="col-sm col-md-6">
                        <div class="card my-4">
                            <div class="section-heading p-2">
                                <h6>latest on biology</h6>
                            </div>
                            <div class="card-body">
                                <h6>MAY 8, 2018 lifestyle</h6>
                                <h5>From Wetlands To Canals And Dams Amsterdam Is Alive</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut officiis tenetur
                                    beatae animi rem earum esse expedita ducimus placeat nesciunt!</p>
                                    
                            </div>
                            <a href="" class="btn mag-btn m-2">Read more...</a>
                        </div>
                    </div>
                    <div class="col-sm col-md-6">
                        <div class="card my-4">
                            <div class="section-heading p-2">
                                <h6>latest on Biochemistry</h6>
                            </div>
                            <div class="card-body">
                                <h6>MAY 8, 2018 lifestyle</h6>
                                <h5>From Wetlands To Canals And Dams Amsterdam Is Alive</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut officiis tenetur
                                    beatae animi rem earum esse expedita ducimus placeat nesciunt!</p>
                                    
                            </div>
                            <a href="" class="btn mag-btn m-2">Read more...</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Feature Video Posts Area -->
        <!--  -->


    </div>

    <!-- >>>>>>>>>>>>>>>>>>>>
     Post Right Sidebar Area
    <<<<<<<<<<<<<<<<<<<<< -->
    <div class="post-sidebar-area right-sidebar mt-30 mb-30">
        <!-- Sidebar Widget -->
        <div class="single-sidebar-widget sticky p-30">
            <!-- Section Title -->
            <div class="section-heading">
                <h6>Newsletter</h6>
            </div>

            <div class="newsletter-form">
                <p>Subscribe our newsletter gor get notification about new updates, information discount, etc.</p>
                <form action="#" method="get">
                    <input type="search" name="widget-search" placeholder="Enter your email">
                    <button type="submit" class="btn mag-btn w-100">Subscribe</button>
                </form>
            </div>

        </div>
    </div>
</section>
<!-- ##### Mag Posts Area End ##### -->

@endsection