@extends('layouts.front_design')

@section('content') 
<style scoped="">
  .modal-backdrop {
    display: none;
    z-index: 1040 !important;
}

.modal-content {
    margin: 2px auto;
    z-index: 1100 !important;
}
</style> 
  <div class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                      <div class="header">
                          <h4 class="title">Offence Table</h4>
                          <p class="category">Here is a list of all Offences Commited</p>
                      </div>

                      @if(session('message'))
                          <p style="color: green; float: right; margin-top: -20px;">
                              {{session('message')}}
                          </p>
                      @endif
                      <div class="content table-responsive table-full-width">
				
            							 <label for="filter"></label><input type="text" name="filter" value="" id="myInput" placeholder="Search with offence ID" onkeyup="myFunction()"/>
                          <script>
                            function myFunction() {
                              // Declare variables
                              var input, filter, table, tr, td, i;
                              input = document.getElementById("myInput");
                              filter = input.value.toUpperCase();
                              table = document.getElementById("myTable");
                              tr = table.getElementsByTagName("tr");

                              // Loop through all table rows, and hide those who don't match the search query
                              for (i = 0; i < tr.length; i++) {
                                td = tr[i].getElementsByTagName("td")[0];
                                if (td) {
                                  if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                    tr[i].style.display = "";
                                  } else {
                                    tr[i].style.display = "none";
                                  }
                                }
                              }
                            }
                          </script>
                          <a href="{{url('/report-offense/create')}}" class="btn btn-info" role="button">Report an Offense </a>
                          <table class="table table-hover table-striped" id="myTable">
                              <thead>
                              	<th>Offence</th>
                                <th>Offender</th>
                                <th>Gender</th>
                              	<th>Reporter</th>
                              	<th>Address</th>
							                  <th>Action</th>
                              </thead>
                              <tbody>
                                @foreach($committedoffenses as $offense)
                                  <tr>
                                   <td>{{$offense->offense->offense_name}}</td>
                                   <td>{{$offense->name}}</td>
                                   <td>{{$offense->gender}}</td>
                                   <td>{{$offense->officer_reporting}}</td>
                                   <td>{{$offense->address}}</td>
                                   <td>
                                      <a title="Click to view details"  data-toggle="modal" data-target="#exampleModal"><i class="fa fa-eye  fa-lg text-success"></i> </a>
                                      &nbsp&nbsp&nbsp&nbsp&nbsp
                                      <a data-target="#editOffenseModal{{$offense->id}}" data-toggle="modal" title="Click to edit details">
                                        <i class="fa fa-edit text-blue fa-lg"></i>
                                      </a>
                                      &nbsp&nbsp&nbsp&nbsp&nbsp
                                      
                                      <a href="{{ url('/delete_coomitted_offense/'.$offense->id)}}" ><i class="fa fa-trash fa-lg text-danger"></i></a>
                                   </td>
                                  </tr>
                                  <!-- View Offence Details Modal -->
                                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Offence Details</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          
                                          <p><strong> Offence</strong>: {{$offense->offense->offense_name}}</p>
                                          <p><strong>Driver's Name</strong>:  {{$offense->name}}</p>
                                          <p><strong>Officer Reporting</strong>: {{$offense->officer_reporting}}</p>
                                          <p><strong>Driver's Address</strong>:  {{$offense->address}}</p>
                                          <p><strong>Date Reported</strong>:  {{date('jS l, F Y h:i A',strtotime($offense->created_at ))}}</p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- Edit Report Offense Modal -->
                                  <div class="modal fade" id="editOffenseModal{{$offense->id}}" tabindex="-1" role="dialog" aria-labelledby="editOffenseModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editOffenseModalLabel">Edit offense</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <form method="post" action="{{url('/editcommittedoffense/'.$offense->id)}}">
                                              @csrf
                                              @method('PUT')
                                              <div class="modal-body">
                                                  <div class="form-group">
                                                    <label for="vehicle_no">Vehicle No</label>
                                                    <input type="text" name="vehicle_no" id="vehicle_no" value=" {{$offense->vehicle_no}}" class="form-control @error('vehicle_no') is-danger @enderror" value="{{ old('vehicle_no') }}" required="">
                                                     @error('vehicle_no')
                                                        <p class="help is-danger">{{$errors->first('vehicle_no')}}</p>
                                                    @enderror
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="driver_license">Driver's Licence</label>
                                                    <input type="text" name="driver_license" id="driver_license" value=" {{$offense->driver_license}}" class="form-control @error('driver_license') is-danger @enderror" value="{{ old('driver_license') }}" required="">
                                                     @error('driver_license')
                                                        <p class="help is-danger">{{$errors->first('driver_license')}}</p>
                                                    @enderror
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="name">Driver's Name</label>
                                                    <input type="text" name="name" id="name" value=" {{$offense->name}}" class="form-control @error('name') is-danger @enderror" value="{{ old('name') }}" required="">
                                                     @error('name')
                                                        <p class="help is-danger">{{$errors->first('name')}}</p>
                                                    @enderror
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <input type="text" name="address" id="address" value=" {{$offense->address}}" class="form-control @error('address') is-danger @enderror" value="{{ old('address') }}" required="">
                                                     @error('address')
                                                        <p class="help is-danger">{{$errors->first('address')}}</p>
                                                    @enderror
                                                  </div>
                                                  <div class="form-group">
                                                      <label>Gender</label>
                                                      <select class="form-control" name="gender" >
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                      </select> 
                                                  </div>
                                                  <input type="hidden" name="officer_reporting"  class="form-control" placeholder="Officer Name" value="{{$user->name}}" readonly required="">
                                                  <div class="form-group">
                                                    <label>Offence</label>
                                                    <select class="form-control" name="offense_id" >
                                                        @foreach($offenses as $offense)
                                                            <option value="{{$offense->id}}">{{$offense->offense_name}}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                                  </div>
                                              </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                            </form>
                                        </div>
                                      </div>
                                  </div>
                                  <!-- end of Edit Offense Modal  --> 
                                 @endforeach
                              </tbody>
                          </table>
                        </div>
                  </div>
              </div>
        </div>
    </div>
  </div>
@endsection