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
                    <option style="display:none" disabled selected value> === Number of Slots Available  == </option>
                    <option value="100"> 100 </option>
                    <option value="200"> 200 </option>
                    <option value="300"> 300 </option>
              </select>
     </div>
    <div class="form-group">
        <label>Departure Location</label>
        <select class="form-control" id="dlocation" name="departurelocation" onchange="return locationValidation();" required>
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
    <div class="form-group">
        <label>Arrival Location</label>
        <select class="form-control" id="alocation" name="arrivallocation" onchange="return locationValidation();" required>
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