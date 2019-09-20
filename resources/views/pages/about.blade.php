@extends('layouts.app')
@section('content')
    <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/11.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="mag-breadcrumb py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="/about">About</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### About Us Area Start ##### -->
    <section class="about-us-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-8">
                    <!-- About Us Content -->
                    <div class="about-us-content bg-white mb-30 p-30 box-shadow">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>About Us</h5>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla consectetur mauris id scelerisque eleifend. Nunc vestibulum cursus quam at scelerisque. Aliquam quis varius orci, vel tincidunt est. Proin ac tincidunti, atmots interdum erat. Maecenas neque lorem, aliquet in tempus non, efficitur ac neque.</p>
                        <p>Phasellus elefend odio quis dolor pretium condimentu. Morbi quis mauris ipsum urna eu fermentum bentons Suspendisse auctor magna ac porta ornare. Fusce finibus nibh at lacinia lobortis.</p>
                        <ul>
                            <li><i class="fa fa-check"></i> Vivamus starlord finibus, dictum massa eget, suscipit metus nami at tristique elit started.</li>
                            <li><i class="fa fa-check"></i> Cras ipsum libero, suscipit vitamin tellus vitae, feugiat ultricies purus praesent gamora.</li>
                            <li><i class="fa fa-check"></i> Proin ex sem, ultrices drax the sit amet, facilisis destroyer et odio profession risusest.</li>
                            <li><i class="fa fa-check"></i> Morbi maximus mauris eget groot dignissim, in laoreet justo facilisis.</li>
                        </ul>
                        <hr>
                        <!-- Team Member Area -->
                        <div class="section-heading mt-30">
                            <h5>Our Team</h5>
                        </div>
                        @foreach ($editor as $item)
                        ` <!-- Single Team Member -->
                        <div class="single-team-member d-flex align-items-center">
                            <div class="team-member-thumbnail">
                                <img src="img/bg-img/36.jpg" alt="">
                                <div class="social-btn">
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="team-member-content">
                                <h6>{{$item->salutation}} {{$item->fullname}}</h6>
                                <span>{{$item->position}}</span>
                                <p>{{$item->current_org}}</p>
                            </div>
                        </div>
                        @endforeach



                    </div>
                </div>

            </div>
        </div>
    </section>
  @endsection
