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
    @foreach($paper as $pap)
    <div class="mag-login-area py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <div class="login-content bg-white p-30 box-shadow">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>{{$pap->title}}</h5>
                        </div>
                        <div class="section-boding">
                            <h5>{{$pap->authors}}</h5>
                        </div>
                        <div class="section-heading">
                            <h5>{{$pap->created_at->diffForHUmans()}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    @endforeach  

@endsection