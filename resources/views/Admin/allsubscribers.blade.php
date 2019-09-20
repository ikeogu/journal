@extends('layouts.dashboard')

@section('board')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> <b style="font-size: 20px;"> Total Subscriber ({{ $subscribers->total() }}) </b>
                    <a style="float: right; padding-top: 8px;" href="{{ Route('export_subscriber') }}">Export</a>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif



                    <table class="table">
                        <thead>
                          <tr>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Subscriptin Date</th>
                            <th>Disable Date</th>
                          </tr>
                        </thead>
                        <tbody>


                            @foreach($subscribers as $subscriber)

                                <tr>
                                    <td>{{ $subscriber->email }}</td>
                                    <td>{{ $subscriber->status }}</td>
                                    <td>{{ $subscriber->subscrib_at }}</td>
                                    <td>{{ $subscriber->disable_at }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                      </table>
                </div>

                {{ $subscribers->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
