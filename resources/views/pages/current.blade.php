@extends('layouts.app')

@section('content')
<div>
    <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(/../img/bg-img/40.jpg)">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Archives</h2>
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
                                <li class="breadcrumb-item"><a href="/"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('current')}}">Current Isusse</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    <div>
    <div class="archive-posts-area bg-white p-30 mb-30 box-shadow">
            <div class="related-post-area bg-white mb-30 px-30 pt-30 box-shadow">
                    <!-- Section Title -->
                    <div class="section-heading">
                        <h5>Current Archives</h5>
                    </div>
            
                    <div class="row">
                        <!-- Single Blog Post -->
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="single-blog-post style-4 mb-30">
                                <ul class="list-group">
                                    
                                            
                                    <li class="list-group-item"><a >{{$issue->title}}</a></li>
                                    <li class="list-group-item"><a >{{$issue->subtitle}}</a></li>
                                    <li class="list-group-item"><a >{{$issue->description}}</a></li>
                                    <li class="list-group-item"><a  color="blue" href="/archives/{{$issue->id}}">View more</a></li>


                                   
                                </ul>   
                            </div>
                        </div>
            
                    </div>
                </div>
                      
        <!-- Pagination -->
        <nav>
            <ul class="pagination">
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#"><i class="ti-angle-right"></i></a></li>
            </ul>
        </nav>
    
    </div>
</div>    
@endsection

    