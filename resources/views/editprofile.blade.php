@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Update Profile</div>
                    <div class="panel-body">
                        <div class="form-group">
                            @role('Admin')
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
                        <form class="form-horizontal" method="POST" action="">
                        {{ csrf_field() }}
                        <!--Name-->
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{auth()->user()->name }}" disabled autofocus>
                                </div>
                            </div>
                            <!--Contact-->
                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Contact</label>

                                <div class="col-md-6">
                                    <input id="contact" type="text" class="form-control" name="contact" value="{{ auth()->user()->contact}}" required>
                                </div>
                            </div>
                            <!--Email-->
                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{auth()->user()->email}}" disabled>
                                </div>
                            </div>
                            <!--Password-->
                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                </div>
                            </div>
                            <!--SchoolOf-->
                            <div class="form-group">
                                <label for="schoolof" class="col-md-4 control-label">SchoolOf</label>

                                <div class="col-md-6">
                                    <input id="schoolof" type="text" class="form-control" name="schoolof" value="{{auth()->user()->schoolof}}" disabled>
                                </div>
                            </div>
                            <!--Course-->
                            <div class="form-group">
                                <label for="course" class="col-md-4 control-label">Course</label>

                                <div class="col-md-6">
                                    <input id="course" type="text" class="form-control" name="course" value="{{auth()->user()->course}}" disabled>
                                </div>
                            </div>
                            <!--Intake-->
                            <div class="form-group">
                                <label for="intake" class="col-md-4 control-label">Intake</label>

                                <div class="col-md-6">
                                    <input id="intake" type="text" class="form-control" name="intake" value="{{auth()->user()->intake}}" disabled>
                                </div>
                            </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" style="float: right">
                                    Edit Profile
                                </button>
                            </div>
                        </div>
                        </form>
                        @endrole

                        <!--Lecturer Role-->
                        <!--Lecturer Edit Profile-->
                        @role('Agent')
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
                        <form class="form-horizontal" method="POST" action="">
                        {{ csrf_field() }}
                        <!--Name-->
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{auth()->user()->name }}" disabled autofocus>
                                </div>
                            </div>
                            <!--Contact-->
                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Contact</label>

                                <div class="col-md-6">
                                    <input id="contact" type="text" class="form-control" name="contact" value="{{ auth()->user()->contact}}" required>
                                </div>
                            </div>
                            <!--Email-->
                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{auth()->user()->email}}" disabled>
                                </div>
                            </div>
                            <!--Password-->
                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                </div>
                            </div>
                            <!--SchoolOf-->
                            <div class="form-group">
                                <label for="schoolof" class="col-md-4 control-label">SchoolOf</label>

                                <div class="col-md-6">
                                    <input id="schoolof" type="text" class="form-control" name="schoolof" value="{{auth()->user()->schoolof}}" disabled>
                                </div>
                            </div>
                            <!--Course-->
                            <div class="form-group">
                                <label for="course" class="col-md-4 control-label">Course</label>

                                <div class="col-md-6">
                                    <input id="course" type="text" class="form-control" name="course" value="{{auth()->user()->course}}" disabled>
                                </div>
                            </div>
                            <!--Interest-->
                            <div class="form-group">
                                <label for="interest" class="col-md-4 control-label">Interest</label>

                                <div class="col-md-6">
                                    <input id="interest" type="text" class="form-control" name="interest" value="{{auth()->user()->interest}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" style="float: right">
                                        Edit Profile
                                    </button>
                                </div>
                            </div>
                        </form>
                        @endrole
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
