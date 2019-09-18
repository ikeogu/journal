
@extends('layouts.app')
@section('content')
<section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/49.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2>Bio Research Journal</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="mag-breadcrumb py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page"><a href="/"><i class="fa fa-home" aria-hidden="true"></i> Home</a> > Search result</li>

                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
<div>


    <section class="mag-posts-area d-flex flex-wrap">

			<div class="post-sidebar-area left-sidebar ">
				<!-- Sidebar Widget -->

			</div>

			<!-- >>>>>>>>>>>>>>>>>>>>
						Main Posts Area
			<<<<<<<<<<<<<<<<<<<<< -->
            <div class="mag-posts-content mt-30 mb-30 p-30 box-shadow">

                    <!-- Trending Now Posts Area -->
                    <div class="trending-now-posts mb-30">
                            <!-- Section Title -->
                            <div class="section-heading">
                                    <h5>Bio Research Journal</h5>
                            </div>
                    </div>
                    @if ($errors->any())
                            <div class="alert alert-danger">
                                    <ul>
                                            @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                            @endforeach
                                    </ul>
                            </div><br />
                            @endif
                            @if (\Session::has('success'))
                            <div class="alert alert-success">
                                    <p>{{ \Session::get('success') }}</p>
                            </div><br />
                        @endif
                    <!-- Feature Video Posts Area -->
                    <div class="feature-video-posts mb-30">
                        <!-- Section Title -->

                        <div class="featured-video-posts">
                            <div class="row">
                                <div class="col-12 col-xl-12">

                                    <!-- Post Contetnt -->
                                    <div class="post-content">

                                        @if(isset($details))
                                            <p> The Search in Categories for  <b> {{ $query }} </b> are :</p>

                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Description</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($details as $cat)
                                                    <tr>
                                                        <td>{{$cat->name}}</td>
                                                        <td>{{$cat->description}}</td>
                                                        
                                                        <td><a href="#">View more</a></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                        

                                        <h5>No Details found. Try to search again !</h5>
                                        @endif

                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
			<div class="post-sidebar-area left-sidebar mt-30 mb-30">
                    <!-- Sidebar Widget -->
                    <div class="single-sidebar-widget sticky p-30"> 
                        <div class="container">
                            <div class="row justify-content-center">
                                <h6>Search in Categories</h6> <br> 
                                <form  method="post" action="{{route('searchcat')}}">
                                        @csrf
                                    <input type="text" name="q" id="search" placeholder="Search and hit enter..." class="form-control">
                                    <button class="btn mag-btn btn-md " style="border-radius:25%; ">Search</button>
                                </form>
                            </div>
                        </div>        
                    </div> 
            </div>
    </section>




@endsection
