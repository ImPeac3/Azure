@extends('layouts.app')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
@section('content')
    @role('Admin')
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Vessel Booking</div>
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
                                <th>Container Quantity</th>
                                <th>Container Size</th>
                                <th>Container Type</th>
                                <th>Item Type</th>
                                <th>Item Description</th>
                                <th>Item Quantity</th>
                                <th>Vessel Name</th>
                                <th>Customer Name</th>
                                <th>Departure Date</th>
                                <th>Arrival Date</th>
                                <th>Departure Location</th>
                                <th>Arrival Location</th>
                            </tr>
                            </thead>
                            @foreach($bookings as $booking)
                                <tr>
                                    <td align="center">{{$booking->id}}</td>
                                    <td align="center">{{$booking->containerquantity}}</td>
                                    <td align="center">{{$booking->containersize}}</td>
                                    <td align="center">{{$booking->containertype}}</td>
                                    <td align="center">{{$booking->itemtype}}</td>
                                    <td align="center">{{$booking->itemdescription}}</td>
                                    <td align="center">{{$booking->itemquantity}}</td>
                                    <td align="center">{{$booking->vesselname}}</td>
                                    <td align="center">{{$booking->username}}</td>
                                    <td align="center">{{$booking->ddate}}</td>
                                    <td align="center">{{$booking->adate}}</td>
                                    <td align="center">{{$booking->dlocation}}</td>
                                    <td align="center">{{$booking->alocation}}</td>
                                </tr>
                            @endforeach
                        </table>
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


