@extends('layouts.app')
@section('content')
    @role('Admin')
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Vessel Details</div>
            <div class="panel-body">
                <!--Search-->
                <div class="form-group">
                    @if(session()->has('notif'))
                        <div class="col-md-12">
                            <div class="alert alert-success">
                                <button type="button" class="close"
                                        data-dismiss="alert" aria-hidden="true">
                                    &times;</button><strong>Notification : </strong>{{session()->get('notif')}}
                            </div>
                        </div>
                </div>
                @endif
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Vessel Name</th>
                        <th>Vessel Number</th>
                        <th>Departure Date</th>
                        <th>Arrival Date</th>
                        <th>Slot Available</th>
                        <th>Departure Location</th>
                        <th>Arrival Location</th>
                    </tr>
                    </thead>
                    @foreach($schedules as $schedule)
                        <tr>
                            <td align="center">{{$schedule->id}}</td>
                            <td align="center">{{$schedule->vesselname}}</td>
                            <td align="center">{{$schedule->vesselnumber}}</td>
                            <td align="center">{{$schedule->departuredate}}</td>
                            <td align="center">{{$schedule->arrivaldate}}</td>
                            <td align="center">{{$schedule->vesselcapacity}}</td>
                            <td align="center">{{$schedule->departurelocation}}</td>
                            <td align="center">{{$schedule->arrivallocation}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    @endrole
@endsection


