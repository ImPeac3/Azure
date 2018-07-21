@extends('layouts.app')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
@section('content')
    @role('Agent')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Vessel Booking</div>
                    <div class="panel-body">
                        <!--Search-->
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
                        <form class="form-horizontal" method="post" action="">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-md-4">
                            <label>Departure Location</label>
                            <select class="form-control" name="departurelocation" id="dlocation" onchange="return locationValidation();">
                                <option style="display:none" disabled selected value> === Departure Location  === </option>
                                <option value="Port A">Port A</option>
                                <option value="Port B">Port B</option>
                                <option value="Port C">Port C</option>
                                <option value="Port D">Port D</option>
                                <option value="Port E">Port E</option>
                                <option value="Port F">Port F</option>
                                <option value="Port G">Port G</option>
                                <option value="Port H">Port H</option>
                            </select>
                            </div>
                            <div class="col-md-4">
                                <label>Arrival Location</label>
                                <select class="form-control" name="arrivallocation" id="alocation" onchange="return locationValidation();">
                                    <option style="display:none" disabled selected value> === Arrival Location  === </option>
                                    <option value="Port A">Port A</option>
                                    <option value="Port B">Port B</option>
                                    <option value="Port C">Port C</option>
                                    <option value="Port D">Port D</option>
                                    <option value="Port E">Port E</option>
                                    <option value="Port F">Port F</option>
                                    <option value="Port G">Port G</option>
                                    <option value="Port H">Port H</option>
                                </select>
                            </div>
                        </div>
                            <button class="btn btn-primary" type="submit">Search</button>
                        </form>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Vessel Name</th>
                                    <th>Vessel Number</th>
                                    <th>Departure Date</th>
                                    <th>Arrival Date</th>
                                    <th>Departure Location</th>
                                    <th>Arrival Location</th>
                                    <th>To Make Booking</th>
                                    <th>Slot Available</th>
                                </tr>
                                </thead>
                                @foreach($schedules as $schedule)
                                    <tr>
                                        <td>{{$schedule->vesselname}}</td>
                                        <td>{{$schedule->vesselnumber}}</td>
                                        <td>{{$schedule->departuredate}}</td>
                                        <td>{{$schedule->arrivaldate}}</td>
                                        <td>{{$schedule->departurelocation}}</td>
                                        <td>{{$schedule->arrivallocation}}</td>
                                        <td>{{$schedule->vesselcapacity}}</td>
                                        <td>
                                            <a href="{{route('additem',['id'=>$schedule->id])}}" class="btn btn-success glyphicon glyphicon-globe">
                                                <i class="fa fa-folder-open"></i>Make Booking
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function locationValidation(valueToSelect){
            var dlocation = document.getElementById('dlocation').value;
            var alocation = document.getElementById('alocation').value;
            if(dlocation == alocation)
            {
                alert('Departure and Arrival location cannot be same');
                document.getElementById('dlocation').selectedIndex = ' -- Departure Location  --';
                document.getElementById('alocation').selectedIndex = ' -- Arrival Location  --';
            }
        }
    </script>
    @endrole
@endsection


