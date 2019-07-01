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
            <li class="active">Publication Fee</li>
          </ol>
        </section>
        <section class="content">
            <!-- Section amount -->
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
                    <form method="POST" action="{{route('fee.store')}}" enctype="multipart/form-data">
                        @csrf
        
                        <div class="form-group">
                            <label for="amount" class="col-form-label ">{{ __('Amount') }}</label>
        
                            
                                <input id="amount" type="number" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" required >
        
                                @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>
        
                        <div class="form-group ">
                            <label for="email" class=" col-form-label">{{ __('Description') }}</label>
        
                            
                                <textarea id="email" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" rows="5"></textarea>
        
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>
        
                        
        
                        <div class="form-group">
                            
                                <button type="submit" class="btn btn-success">
                                    {{ __('Submit') }}
                           
                        </div>
                    </form>
            </div>
           
        </section>
    </div>
      

@endsection
