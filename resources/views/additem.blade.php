@extends('layouts.app')
@section('content')
    @role('Agent')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register Customer</div>
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
                                    <label>Customer Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Customer Name" required>
                                </div>
                                <div class="form-group">
                                    <label>Customer Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="Customer Email" required>
                                </div>
                                <div class="form-group">
                                    <label>Customer Contact</label>
                                    <input type="text" class="form-control" name="contact" placeholder="Customer Contact" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Customer Password" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Register Customer</button>
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