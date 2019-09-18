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
            <li class="active">Publish</li>
          </ol>
        </section>
        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                <h3 class="box-title">Few steps to Publish</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
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
                <form role="form" method="POST" action="{{route('publish.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body col-6">
                        <div class="form-group has-success ">
                            <label class="control-label" for="inputSuccess">   Paper Title</label>
                            <input type="text" class="form-control  @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required id="inputSuccess" placeholder="Enter ...">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <span class="help-block">what's the title of the paper</span>
                        </div>
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess">   Author's Name</label>
                            <input type="text" class="form-control @error('author_name') is-invalid @enderror" name="author_name" value="{{ old('author_name') }}" required id="inputSuccess" placeholder="Enter ...">
                            @error('author_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <span class="help-block"> @ e,g Emmanuel .I, Odera D.</span>
                        </div>

                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess">   {{ __('Author\'s Email') }}</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="authors_email" value="{{ old('authors_email') }}" required id="inputSuccess" placeholder="Enter ...">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <span class="help-block">authorsemail@mail.com</span>
                        </div>
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess">   {{ __('KeyWords') }}</label>
                            <input type="text" class="form-control  @error('keywords') is-invalid @enderror" name="keywords" value="{{ old('keywords') }}" required id="inputSuccess" placeholder="Enter ...">
                            @error('keywords')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <span class="help-block">keywords:cell, aquatic, placenter</span>
                        </div>
                        <div class="form-group has-success">  
                            <label class="control-label" for="inputSuccess">Select {{ __('Publication Edition') }}</label>
                            <select class="form-control " id="inputSuccess" name="archive_id">
                                <option>--Select Journal--</option>
                                <option value="0">Not a Journal</option>
                                @foreach($archive as $key)
                                    <option value="{{$key->id}}"> 
                                            {{$key->title}} 
                                    </option>
                                @endforeach  
                            </select>
                        
                        </div>
                        <div class="form-group has-success">  
                                <label class="control-label" for="inputSuccess">Select {{ __('Category') }}</label>
                                <select class="form-control m-bot15" name="cat_id">

                                        @if ($cat->count() > 0 )
                                    
                                            @foreach($cat as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>    
                                            @endforeach
                                        @endif
                                    
                                    </select>
                            
                        </div>
                        <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">  No. Of Pages</label>
                        <input type="text" class="form-control @error('no_pages') is-invalid @enderror" name="no_pages" value="{{ old('no_pages') }}" required  id="inputSuccess" placeholder="Enter ...">
                        <span class="help-block">i.e 5-6, 1-20</span>
                        </div>
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess">   Abstract</label>
                                
                            <textarea class="form-control @error('abstract') is-invalid @enderror" name="abstract" value="{{ old('abstract') }}" required rows="3" placeholder="Enter ...">

                            </textarea>
                            
                            <span class="help-block">The Abstract of the paper</span>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputFile">Upload Manuscript</label>
                        <input type="file" id="exampleInputFile"  @error('filename') is-invalid @enderror" name="filename" value="{{ old('filename') }}" required>

                        <p class="help-block">Upload the file Submitted by the author</p>
                        </div>
                        <div class="box-footer">
                                <button type="submit" class="btn btn-success">Publish</button>
                        </div>
                    </div>
                    <!-- /.box-body -->

                   
                <div>
                </form>
            </div>
        </section>                
    </div>                   
                           
@endsection
    