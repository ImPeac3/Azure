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
                                <option style="display:none" disabled selected value> -- Departure Location  -- </option>
                                <option value="Bintulu Port (Sarawak)">Bintulu Port (Sarawak)</option>
                                <option value="Johor Port (Johor)">Johor Port (Johor)</option>
                                <option value="Kemaman Port (Terengganu)">Kemaman Port (Terengganu)</option>
                                <option value="Kota Kinabalu Port (Sabah)">Kota Kinabalu Port (Sabah)</option>
                                <option value="Kuantan Port (Kuantan)">Kuantan Port (Kuantan)</option>
                                <option value="Kuching Port (Sarawak)">Kuching Port (Sarawak)</option>
                                <option value="Kudat Port (Sabah)">Kudat Port (Sabah)</option>
                                <option value="Kunak Port (Sabah)">Kunak Port (Sabah)</option>
                                <option value="Labuan Port (Sabah)">Labuan Port (Sabah)</option>
                                <option value="Lahad Datu Port (Sabah)">Lahad Datu Port (Sabah)</option>
                                <option value="Lumut Port (Perak)">Lumut Port (Perak)</option>
                                <option value="Miri Port (Sarawak)">Miri Port (Sarawak)</option>
                                <option value="Peneng Port (Peneng)">Peneng Port (Peneng)</option>
                                <option value="Port Klang (Selangor)">Port Klang (Selangor)</option>
                                <option value="Tanjung Pelepas (Johor)">Tanjung Pelepas (Johor)</option>
                                <option value="Rajang (Johor)">Tanjung Pelepas (Sarawak)</option>
                                <option value="Sandakan Port (Sabah)">Sandakan Port (Sabah)</option>
                                <option value="Tawau Port (Sabah)">Tawau Port (Sabah)</option>
                            </select>
                            </div>
                            <div class="col-md-4">
                                <label>Arrival Location</label>
                                <select class="form-control" name="arrivallocation" id="alocation" onchange="return locationValidation();">
                                    <option style="display:none" disabled selected value> -- Arrival Location  -- </option>
                                    <option value="Bintulu Port (Sarawak)">Bintulu Port (Sarawak)</option>
                                    <option value="Johor Port (Johor)">Johor Port (Johor)</option>
                                    <option value="Kemaman Port (Terengganu)">Kemaman Port (Terengganu)</option>
                                    <option value="Kota Kinabalu Port (Sabah)">Kota Kinabalu Port (Sabah)</option>
                                    <option value="Kuantan Port (Kuantan)">Kuantan Port (Kuantan)</option>
                                    <option value="Kuching Port (Sarawak)">Kuching Port (Sarawak)</option>
                                    <option value="Kudat Port (Sabah)">Kudat Port (Sabah)</option>
                                    <option value="Kunak Port (Sabah)">Kunak Port (Sabah)</option>
                                    <option value="Labuan Port (Sabah)">Labuan Port (Sabah)</option>
                                    <option value="Lahad Datu Port (Sabah)">Lahad Datu Port (Sabah)</option>
                                    <option value="Lumut Port (Perak)">Lumut Port (Perak)</option>
                                    <option value="Miri Port (Sarawak)">Miri Port (Sarawak)</option>
                                    <option value="Peneng Port (Peneng)">Peneng Port (Peneng)</option>
                                    <option value="Port Klang (Selangor)">Port Klang (Selangor)</option>
                                    <option value="Tanjung Pelepas (Johor)">Tanjung Pelepas (Johor)</option>
                                    <option value="Rajang (Johor)">Tanjung Pelepas (Sarawak)</option>
                                    <option value="Sandakan Port (Sabah)">Sandakan Port (Sabah)</option>
                                    <option value="Tawau Port (Sabah)">Tawau Port (Sabah)</option>
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
                                    <th>Vessel Capacity</th>
                                    <th>Departure Location</th>
                                    <th>Arrival Location</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                @foreach($schedules as $schedule)
                                    <tr>
                                        <td align="center">{{$schedule->vesselname}}</td>
                                        <td align="center">{{$schedule->vesselnumber}}</td>
                                        <td align="center">{{$schedule->departuredate}}</td>
                                        <td align="center">{{$schedule->arrivaldate}}</td>
                                        <td align="center">{{$schedule->vesselcapacity}}</td>
                                        <td align="center">{{$schedule->departurelocation}}</td>
                                        <td align="center">{{$schedule->arrivallocation}}</td>
                                        <td align="center">
                                            <a href="{{route('additem',['id'=>$schedule->id])}}" class="btn btn-success glyphicon glyphicon-globe">
                                                <i class="fa fa-folder-open"></i>Book
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


