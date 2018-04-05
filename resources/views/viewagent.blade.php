@extends('layouts.app')
@section('content')
    @role('Admin')
    <!--Search-->
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Agent List</div>
                    <div class="panel-body">
                        @foreach($agents as $agent)
                            <div class="col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Agent</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row-fluid">
                                            <table class="table table-condensed table-responsive table-user-information">
                                                <tbody>
                                                <tr>
                                                    <td>Name : {{$agent->name}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Contact : {{$agent->contact}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Email : {{$agent->email}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endrole
@endsection
