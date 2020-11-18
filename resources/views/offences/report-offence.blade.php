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
                        <h4 class="title">Report an Offense</h4>
                    </div>
                    <div class="content">
					    <form  action="{{url('/report-offense')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Vehicle Reg. No.</label>
                                        <input type="text" name="vehicle_no" class="form-control" placeholder="Vehicle Reg. No." required="" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="License">Driver's License</label>
                                        <input type="text" name="driver_licence"  class="form-control" placeholder="Driver's License" required="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Driver's Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Driver's Name" required="">
                                    </div>
                                </div>
                             </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="address" id="searchTextField" class="form-control" placeholder="Address of Incident"  required="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select class="form-control" name="gender" >
                                          <option value="Male">Male</option>
                                          <option value="Female">Female</option>
                                        </select> 
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Officer Reporting</label>
                                        <input type="text" name="officer_reporting"  class="form-control" placeholder="Officer Name" value="{{$user->name}}" readonly required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Offense</label>
                                        <select class="form-control" name="offense_id" >
                                            <option selected disabled>..Choose Offense Type..</option>
                                            @foreach($offenses as $offense)
                                                <option value="{{$offense->id}}">{{$offense->offense_name}}</option>
                                            @endforeach
                                            
                                        </select>
									</div>
                                </div>
                            </div>
                           <button type="submit" class="btn btn-info btn-fill pull-right">Report Offence</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
