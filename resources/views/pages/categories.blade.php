@extends('layouts.app')
@section('content')
<!-- ##### Breadcrumb Area Start ##### -->
    <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/41.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Categories</h2>
                    </div>
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
                            <li class="breadcrumb-item active"><a href="/categories">Categories</a></li>
                            
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="mag-posts-area d-flex flex-wrap">

        <!-- ##### Archive Post Area Start ##### -->
        <div class="archive-post-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-xl-12">
                        <div class="archive-posts-area bg-white p-30 mb-30 box-shadow">

                            <!-- Single Catagory Post -->
                            
                            
                                @foreach ($cat as $item)
                                    <div class="single-catagory-post d-flex flex-wrap"> 
                                    <!-- Post Contetnt -->
                                    <div class="post-content">
                                            <div class="post-meta">
                                                <a href="" class="post-title"> {{$item->name}}</a>
                                            
                                            </div>
                                        
                                            <!-- Post Meta -->
                                        <u> <h6>Description</h6></u>
                                            <p>{{$item->description}}</p>
                                        <a href="/categorized/{{$item->id}}" style="color:blueviolet;">View articles</a>
                                        </div>
                                    </div>     
                                @endforeach
                            

                            <!-- Pagination -->
                        
                            {{$cat->links()}}
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