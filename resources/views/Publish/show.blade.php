@extends('layouts.app')

@section('content')
<div>
    <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(/../img/bg-img/40.jpg)">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Submit A Paper</h2>
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
                                <li class="breadcrumb-item " ><a href="{{route('archives.index')}}">Archives</a></li>
                                <li class="breadcrumb-item ">Issues </li>
                                <li class="breadcrumb-item active" aria-current="page">Article :{{$publish->title}}</li>

                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    <div>
<div>
    <section class="post-details-area">
            <div class="container">
                <div class="row justify-content-center">
                    <!-- Post Details Content Area -->
                    <div class="col-12 col-xl-8">
                        <div class="post-details-content bg-white mb-30 p-30 box-shadow">
                           
                            <div class="blog-content">
                                <div class="post-meta">
                                    <a href="#">{{$publish->author_name}}</a><br>
                                    <a href="#">{{$publish->authors_email}}</a><br>
                                    <a href="#">{{$publish->created_at->diffForHumans()}}</a><br>
                                </div>
                                <h4 class="post-title">{{$publish->title}}</h4>
                               
                                <div class="post-meta">
                                   <h4>Abstract</h4>
                                </div>
                                <p style="text-align:center">
                                        {{$publish->abstract}} 
                                </p>
    
                               
    
                                <blockquote>
                                    <h6 class="quote-text">
                                        Keywords:   {{$publish->keywords}} 
                                    </h6>
                                   
                                </blockquote>
                                <div class="post-meta-2">
                                        <a href="{{route('preview',[$publish->id])}}"><i class="fa fa-eye" aria-hidden="true" target="_blank"></i> Preview</a>
                                <a href="{{route('download',[$publish->id])}}"><i class="fa fa-download" aria-hidden="true"></i> Download</a>
                                       
                                       
                                    </div>
                                 <!-- Post Meta -->
                                 
                            </div>
                        </div>
    
                        
    
                     
    
                       
                    </div>
    
                   
                </div>
            </div>
        </section>
</div>
@endsection
