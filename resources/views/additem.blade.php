@extends('layouts.app')
@section('content')
    @role('Agent')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register Item</div>
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
                                    <select class="form-control" name="customer_id" required>
                                        @foreach($customers as $customer)
                                            <option style="display:none" disabled selected value> === Select customer === </option>
                                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Item Type</label>
                                    <input type="text" class="form-control" name="itemtype" placeholder="Item Type" required>
                                </div>
                                <div class="form-group">
                                    <label>Item Description</label>
                                    <input type="text" class="form-control" name="itemdescription" placeholder="Item Description" required>
                                </div>
                                <div class="form-group">
                                    <label>Item Weight</label>
                                    <input type="text" class="form-control" name="itemquantity" placeholder="Item Weight( Kg )" required>
                                </div>
                                <div class="form-group">
                                    <label>Container Quantity</label>
                                    <select class="form-control" name="containerquantity" required>
                                        <option style="display:none" disabled selected value> === Number of Container  === </option>
                                        <option value="1"> 1 </option>
                                        <option value="2"> 2 </option>
                                        <option value="3"> 3 </option>
                                        <option value="4"> 4 </option>
                                        <option value="5"> 5 </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Container Size</label>
                                    <select class="form-control" name="containersize" required>
                                        <option style="display:none" disabled selected value> === Container Size  === </option>
                                        <option value="S"> Small </option>
                                        <option value="M"> Medium </option>
                                        <option value="L"> Large </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Container Type</label>
                                    <select class="form-control" name="containertype" required>
                                        <option style="display:none" disabled selected value> === Container Type === </option>
                                        <option value="Normal"> Normal </option>
                                        <option value="Advanced"> Advanced</option>
                                    </select>
                                </div>
                                <br>
                                <div class="form-group">
                                    @foreach($data as $datas)
                                    <button type="submit" name="schedule_id" value="{{$datas->id}}" class="btn btn-primary">Create Booking</button>
                                    @endforeach
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