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

            							 <label for="filter"></label> <input type="text" name="filter" value="" id="myInput" placeholder="Search with Username" onkeyup="myFunction()"/>
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
                                    td = tr[i].getElementsByTagName("td")[1];
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
                          <table class="table table-hover table-striped" id="myTable">
                              <thead>
                              	<th>Offence</th>
                                <th>Driver's License</th>
                                <th>Gender</th>
                              	<th>Reporter</th>
                              	<th>Address</th>
							                  <th>Action</th>
                              </thead>
                              <tbody>
                                @foreach($useroffenses as $offense)
                                  <tr>
                                     <td>{{$offense->offense->offense_name}}</td>
                                     <td>{{$offense->driver_licence}}</td>
                                     <td>{{$offense->gender}}</td>
                                     <td>{{$offense->officer_reporting}}</td>
                                     <td>{{$offense->address}}</td>
                                     <td>
                                        <a title="Click to view details"  data-toggle="modal" data-target="#exampleModal"><i class="fa fa-eye  fa-lg text-success"></i> </a>
                                        &nbsp&nbsp&nbsp&nbsp&nbsp
                                        <a href="{{url('/pay-offence/'.$offense->id)}}" type="button" class="btn btn-info" role="button">Pay</a>
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
                                          <p><strong>Address</strong>:  {{$offense->address}}</p>
                                          <p><strong>Date Reported</strong>:  {{date('jS l, F Y h:i A',strtotime($offense->created_at ))}}</p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
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
