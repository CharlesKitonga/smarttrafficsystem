@extends('layouts.front_design')

@section('content')  
  <div class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                      <div class="header">
                          <h4 class="title">User's Table</h4>
                      </div>
                      <div class="content table-responsive table-full-width">
                      	<table class="table table-hover table-striped" id="myTable">
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
                                    td = tr[i].getElementsByTagName("td")[2];
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

                              <thead>
                                <th>User ID</th>
                              	<th>Name</th>
                              	<th>Username</th>
                              	<th>Email</th>
                              	<th>Position</th>
							                  <th>Action</th>
                              </thead>
                              <tbody>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection		
