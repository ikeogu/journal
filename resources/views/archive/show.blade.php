@extends('layouts.app')

@section('content')
<div>
    <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(/../img/bg-img/9.jpg)">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                    <h2>{{$issues->title}}</h2>
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
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('archives.index')}}">Archives</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Issues :{{$issues->title}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    <div>
    <div class="archive-posts-area bg-white p-30 mb-30 box-shadow">
        <div class="container">
            @foreach($issues->archive_pub as $h)
            <div class="row justify-content-center">
                <div class="col-3 col-lg-3">
                    <ul class="list-group">

                         <div>
                            <li class="list-group-item"> <u>
                                <strong>Title:</strong> <a href="/publish/{{$h->id}}" style="color:blue">{{$h->title}}</a></u><br>
                                <strong>Authors: {{$h->author_name}}</strong><br>
                                <strong>Pages: {{$h->no_pages}}</strong>

                            </li>
                        </div>



                    </ul>
                </div>
            </div>
            @endforeach
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

