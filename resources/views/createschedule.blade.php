@extends('layouts.app')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
@section('content')
    @role('Admin')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Schedule</div>
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
        <label>Vessel Name</label>
        <input type="text" class="form-control" name="vesselname" placeholder="Vessel Name" required>
    </div>
    <div class="form-group">
        <label>Vessel Number</label>
        <input type="text" class="form-control" name="vesselnumber" placeholder="Vessel Number" required>
    </div>
    <div class="form-group">
        <label>Departure Date</label>
        <input type="text" class="form-control" id="from" name="from" required>
        </span>
    </div>
    <div class="form-group">
        <label>Arrival Date</label>
        <input type="text" class="form-control" id="to" name="to" required>
    </div>
     <div class="form-group">
         <label>Vessel Capacity</label>
              <select class="form-control" name="vesselcapacity" required>
                    <option style="display:none" disabled selected value> -- Select No. Slot Available  -- </option>
                    <option value="100"> 100 </option>
                    <option value="200"> 200 </option>
                    <option value="300"> 300 </option>
              </select>
     </div>
    <div class="form-group">
        <label>Departure Location</label>
        <select class="form-control" id="dlocation" name="departurelocation" onchange="return locationValidation();" required>
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
    <div class="form-group">
        <label>Arrival Location</label>
        <select class="form-control" id="alocation" name="arrivallocation" onchange="return locationValidation();" required>
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
    <br>
     <div class="form-group">
    <button type="submit" class="btn btn-primary">Create Schedule</button>
         </div>
     </form>
     </div>
</div>
</div>
</div>
</div>
</div>
    <script>
        function markerValidation(valueToSelect){
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