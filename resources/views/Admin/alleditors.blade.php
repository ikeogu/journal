@extends('layouts.dashboard')

@section('board')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 926px;">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Dashboard
          <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">All Editors </li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                    <div class="box-header">
                    <h3 class="box-title">You have {{$editors->count()}} Applications For Editor</h3>

                        <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                            <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Salutation</th>

                            <th>Name</th>
                            <th>Gender</th>
                            <th>phone</th>
                            <th>Email</th>
                            <th>Position</th>
                            <th>Qualification</th>
                            <th>Authored Book</th>
                            <th>Authored Publication</th>
                            <th>Current Org</th>
                            <th>Research Area</th>
                            <th>Resume</th>
                            <th>Status</th>
                            <th>Action</th>


                        </tr>
                        @foreach($editors as $pap)
                        <tr>
                            <td>{{$pap->id}}</td>
                            <td>{{$pap->salutation}}</td>
                            <td>{{$pap->fullname}}</td>
                            <td>{{$pap->gender}}</td>
                            <td>{{$pap->phone}}</td>
                            <td>{{$pap->email}}</td>
                            <td>{{$pap->position}}</td>
                            <td>{{$pap->qualification}}</td>
                            <td>{{$pap->books_authored}}</td>
                            <td>{{$pap->authored_pub}}</td>
                            <td>{{$pap->current_org}}</td>
                            <td>{{$pap->research_area}}</td>
                            <td>
                            <a href="{{route('cv',[$pap->id])}}">
                                <i aria-hidden="true" target="_blank">
                                </i> Preview</a></td>
                            @if($pap->status==0)
                                <td>Not Editor</td>
                            @elseif($pap->status==1)
                                 <td>Editor</td>
                            @endif
                            <td>
                            <form action="{{route('editors.update',[$pap->id])}}" method="POST">
                                    @csrf
                                <input type="hidden" name="_method" value="PATCH">
                                <input type="hidden" name="status" value="1">
                                <button type="submit" class="btn btn-sm btn-success">Make Editor</button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                    <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
@endsection
