@extends('layouts.app')
@section('content')
    <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/40.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Pay before you publish</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="mag-breadcrumb py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="/make_payment">make Payment</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="mag-login-area py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6 ">
                    <div class="login-content bg-white p-30 box-shadow">
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

                        <form method="POST" action="{{route('pay')}}" accept-charset="UTF-8"  role="form">
                                {{ csrf_field() }}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                            <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}

                            <input type="hidden" name="quantity" value="1">
                            <input type="hidden" name="metadata" value="{{ json_encode($array = ['user_name' => auth()->user()->name]) }}" >
                            <div class="form-group">
                                <input type="email" name="email" value="{{auth()->user()->email}}"  class="form-control">
                            </div>
                            <div class="form-group">
                                    <label >Charges per Article </label>
                                <select name="amount"  type="number"  class="form-control">
                                    @foreach ($fee as $item)
                                        <option value="{{$item->amount * 100}}">{{$item->amount}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label >Payment for </label>
                                <br>
                                <input type="radio" name="order_id" value=1> Single Artilcle Publish<br>
                                <input type="radio" name="order_id" value=2> Publication Issue<br>
                            </div>

                                <p>
                                <button class="btn btn-success btn-md btn-block" type="submit" value="Pay Now!">
                                <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                                </button>
                                </p>
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
