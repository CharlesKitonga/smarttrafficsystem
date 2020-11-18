@extends('layouts.front_design')
@section('content')
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjQcxyqzY6U6N9LwQmkitmRpXJEwG4xoY&libraries=places"></script>
  <script >
    function initialize() {
        var input = document.getElementById('searchTextField');
        new google.maps.places.Autocomplete(input);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
    
  </script>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Offence Details</h4>
                         @if(Session::has('flash_message_error'))
                        <div class="alert alert-error alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong>{!! session('flash_message_error') !!}</strong>
                        </div>
                        @endif  
                        @if(Session::has('flash_message_success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{!! session('flash_message_success') !!}</strong>
                            </div>
                        @endif

                    </div>
                    <div class="content">
                        <div class="col-md-4">
                            <p>{{$useroffenses->offense->offense_name}}</p>
                            <p>{{$useroffenses->offense->penalty}}</p>
                            <p>{{$useroffenses->address}}</p>
                        </div>
                        <form action="{{('/mpesa')}}" method="post">
                            @csrf
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Telephone</label>
                                        <input type="text" name="phoneNumber" value="{{$userDetails->telephone}}" class="form-control" placeholder="Mobile Number">
                                         <input type="hidden" class="form-control" name="amount" value="{{$useroffenses->offense->penalty}}" readonly="">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-info btn-fill pull-right">Make Payment</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection