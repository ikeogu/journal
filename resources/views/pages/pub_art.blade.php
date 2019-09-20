@extends('layouts.app')

@section('content')
<div>
    <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(/../img/bg-img/5.jpg)">
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
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('publish.index')}}">Published Article</a></li>
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
                        <h5> Articles</h5>
                    </div>

                    <div class="row">
                        <!-- Single Blog Post -->
                        @foreach($publish as $pap)
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="single-blog-post style-4 mb-30">
                                <ul class="list-group">


                                    <li class="list-group-item">
                                        <h6> Title : <a href="/publish/{{$pap->id}}" style="color:blue;"> {{$pap->title}}</a> </h6></li>
                                    <li class="list-group-item"> <h6> Author : <a href="/publish/{{$pap->id}}"> {{$pap->author_name}}</a> </h6></li>

                                </ul>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

        <!-- Pagination -->
        {{$publish->links()}}

    </div>
</div>
@endsection

