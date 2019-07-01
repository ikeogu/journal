@extends('layouts.dashboard')

@section('board')
    <div class="content-wrapper" style="min-height: 926px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">archives</li>
          </ol>
        </section>
        <section class="content">
            <!-- Section Title -->
            <div class="section-heading">
                <h5>Fill the Form</h5>
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
            <div class="box-body">
                    <form method="POST" action="{{route('archives.store')}}" enctype="multipart/form-data">
                        @csrf
        
                        <div class="form-group">
                            <label for="title" class="col-form-label ">{{ __('Title') }}</label>
        
                            
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
        
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-form-label ">{{ __('Subtitle') }}</label>
        
                            
                                <input id="title" type="text" class="form-control @error('subtitle') is-invalid @enderror" name="subtitle" value="{{ old('subtitle') }}" required autocomplete="subtitle" autofocus>
        
                                @error('subtitle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>
                        <div class="form-group">
                            <label class="col-form-label ">{{ __('Description') }}</label>
        
                            
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus>
        
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>
        
                        <div class="form-group ">
                            <label for="email" class=" col-form-label">{{ __('cover page front') }}</label>
        
                            
                                <input id="email" type="file" class="form-control @error('cover_page_front') is-invalid @enderror" name="cover_page_front" value="{{ old('cover_page_front') }}" required autocomplete="cover_page_front">
        
                                @error('cover_page_front')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>
        
                        <div class="form-group ">
                            <label for="email" class=" col-form-label ">{{ __('cover page Back') }}</label>
        
                            
                                <input id="cover_page_back" type="file" class="form-control @error('cover_page_back') is-invalid @enderror" name="cover_page_back" value="{{ old('cover_page_back') }}" required autocomplete="cover_page_back">
        
                                @error('cover_page_back')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>
        
                        <div class="form-group">
                            
                                <button type="submit" class="btn btn-success">
                                    {{ __('Send') }}
                           
                        </div>
                    </form>
            </div>
           
        </section>
    </div>
      

@endsection
