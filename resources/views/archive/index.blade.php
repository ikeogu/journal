@extends('layouts.app')

@section('content')
<div>
    <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(/../img/bg-img/40.jpg)">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Articles Submitted</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="archive-posts-area bg-white p-30 mb-30 box-shadow">

        @foreach($issues as $pap)
        <div class="single-catagory-post d-flex flex-wrap">
            <!-- Thumbnail -->
            <div class="post-thumbnail bg-img" style="background-image: url(img/bg-img/42.jpg);">
                <img src="storage/cover_page_front/{{$pap->cover_page_front}}"> 
            </div>
    
            <!-- Post Contetnt -->
            <div class="post-content">
                <div class="post-meta">
                    <a href="#">{{$pap->created_at->diffForHUmans()}}</a>
                    <a href="archives/{{$pap->id}}">{{$pap->title}}</a>
                </div>
                <a href="video-post.html" class="post-title">Global Travel And Vacations Luxury Travel On A Tight Budget</a>
                <!-- Post Meta -->
                <div class="post-meta-2">
                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 1034</a>
                    <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a>
                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 234</a>
                </div>
                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa officia deserunt mollit anim id est laborum. Sed ut perspiciatis lorem150</p>
            </div>
        </div>
    
        @endforeach  
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
@endsection
