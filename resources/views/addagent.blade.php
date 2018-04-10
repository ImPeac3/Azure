@extends('layouts.app')
@section('content')
    @role('Admin')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register Agent</div>
                    <div class="panel-body">
                        <div class="form-group">
                            @if(session()->has('notif'))
                                <div class="col-md-12 col-md-offset-0">
                                    <div class="alert alert-success">
                                        <button type="button" class="close"
                                                data-dismiss="alert" aria-hidden="true">
                                            &times;</button><strong>Notification : </strong>{{session()->get('notif')}}
                                    </div>
                                </div>
                        </div>
                        @endif
                        <div class="col-md-12">
                            <form class="form-horizontal" method="POST" action="">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Agent Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Agent Name" required>
                                </div>
                                <div class="form-group" {{ $errors->has('email') ? ' has-error' : '' }}>
                                    <label>Agent Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="Agent Email" required>
                                </div>
                                <div class="form-group" {{ $errors->has('contact') ? ' has-error' : '' }}>
                                    <label>Agent Contact</label>
                                    <input type="text" class="form-control" name="contact" placeholder="Agent Contact" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Agent Password" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Register Agent</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endrole
@endsection