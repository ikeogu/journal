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
          <li class="active">All Users </li>
        </ol>
      </section>
  
      <!-- Main content -->
      <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                    <div class="box-header">
                    <h3 class="box-title">{{$users->count()}} are Registered </h3>
        
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Joined</th>
                            
                        </tr>
                        @foreach($users as $pap)
                        <tr>
                            <td>{{$pap->id}}</td>
                            <td>{{$pap->name}}</td>
                            <td>{{$pap->email}}</td>
                            <td>{{$pap->created_at->diffForHUmans()}}</td>
                         
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