@extends('layouts.app')

@section('content')
<div>
    <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(/../img/bg-img/40.jpg)">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Apply For Editor</h2>
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
                                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('editors.create')}}">Apply as Editor</a></li>

                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    <div>
    <div class="mag-login-area py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12">
                    <div class="login-content bg-white p-30 box-shadow">
                        <!-- Section salutation -->
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
                        <form method="POST" action="{{route('editors.store')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="salutation" class="col-md-4 col-form-label text-md-right">{{ __('Salutation') }}</label>

                                <div class="col-md-6">
                                    <input id="salutation" type="text" class="form-control @error('salutation') is-invalid @enderror" name="salutation" value="{{ old('salutation') }}" required autocomplete="salutation" autofocus placeholder="Sir/ Madam/ Mr/Mrs/ Master/Miss">

                                    @error('salutation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __(' Full Name ') }}</label>

                                <div class="col-md-6">
                                    <input  type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{ auth()->user()->name }}" required autocomplete="fullname">

                                    @error('fullname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ auth()->user()->email}}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                                <div class="col-md-6">
                                    <select name="gender" class="form-control">
                                        <option> - Gender -</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label for="salutation" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                                    <div class="col-md-6">
                                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Position') }}</label>

                                <div class="col-md-6">
                                    <input id="position" type="text" class="form-control @error('position') is-invalid @enderror" name="position" value="Editor" readonly>

                                    @error('position')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Highest Degrees') }}</label>

                                <div class="col-md-6">
                                        <select name="qualification" class="form-control">
                                            <option>- Degrees -</option>

                                            <option value="phd">PHD</option>
                                            <option value="doctorate">Doctorate</option>
                                            <option value="masters">Masters</option>
                                            <option value="bsc">BSC</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Current Organization') }}</label>

                                <div class="col-md-6">
                                    <input id="current_org" type="text" class="form-control @error('current_org') is-invalid @enderror" name="current_org" value="{{ old('current_org') }}" required placeholder="E.g Lecture in University of Port Harcourt">

                                    @error('current_org')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Research Area') }}</label>

                                <div class="col-md-6">
                                    <input id="research_area " type="text" class="form-control @error('research_area ') is-invalid @enderror" name="research_area" value="{{ old('research_area ') }}" required autocomplete="keywords">

                                    @error('research_area ')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="authored_pub" class="col-md-4 col-form-label text-md-right">{{ __('Title of Authored Publication') }}</label>

                                <div class="col-md-6">
                                    <input id="salutation" type="text" class="form-control @error('authored_pub') is-invalid @enderror" name="authored_pub" value="{{ old('authored_pub') }}" required autocomplete="salutation" autofocus>

                                    @error('authored_pub')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="salutation" class="col-md-4 col-form-label text-md-right">{{ __('Title of Books Authored') }}</label>

                                <div class="col-md-6">
                                    <input id="books_authored" type="text" class="form-control @error('books_authored') is-invalid @enderror" name="books_authored" value="{{ old('books_authored') }}" required autocomplete="books_authored" autofocus>

                                    @error('books_authored')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>




                            <div class="form-group row">
                                <label for="resume" class="col-md-4 col-form-label text-md-right">{{ __('Resume') }}</label>

                                <div class="col-md-6">
                                    <input id="resume" type="file" class="form-control @error('resume') is-invalid @enderror" name="resume" value="{{ old('resume') }}" required autocomplete="resume" autofocus>

                                    @error('resume')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="mag-btn">
                                        {{ __('Apply') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
