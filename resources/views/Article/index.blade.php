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
            <li class="active">All Submitted Articles</li>
          </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Submitted Papers</h3>

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
                            <th>Title</th>
                            <th>Date</th>
                            <th>Author</th>
                            <th>Subject Area</th>
                            <th>KeyWords</th>
                            <th>Publication Edition</th>

                            <th>Know us</th>
                            <th>Agree</th>
                        </tr>
                        @foreach($paper as $pap)
                        <tr>
                            <td>{{$pap->id}}</td>
                            <td>{{$pap->title}}</td>
                            <td>{{$pap->created_at->diffForHUmans()}}</td>
                            <td>{{$pap->author_name}}</td>
                            <td>{{$pap->subject_area}}</td>
                            <td>{{$pap->keywords}}</td>
                            <td>{{$pap->publication_edition}}</td>

                            <td>{{$pap->know_us}}</td>
                            <td>@if($pap->agree == 1)
                                <p>Yes</p>

                                @endif
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
    </div>
@endsection
