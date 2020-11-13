@extends('layouts.front_design')

@section('content')  
  <div class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                      <div class="header">
                          <h4 class="title">Offence Table</h4>
                          <p class="category">Here is a list of all Offences Commited</p>
                      </div>
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
                          <a href="{{url('/report-offense')}}" class="btn btn-info" role="button">Report an Offense </a>
                          <table class="table table-hover table-striped" id="myTable">
                              <thead>
                                <th>Offence ID</th>
                              	<th>Offence</th>
                              	<th>Offender</th>
                              	<th>Reporter</th>
                              	<th>Address</th>
							                  <th>Action</th>
                              </thead>
                              <tbody>
                                 <tr></tr>
                                 <tr></tr>
                                 <tr></tr>
                                 <tr></tr>
                                 <tr></tr>
                                 <tr></tr>
                              </tbody>
                          </table>
                        </div>
                  </div>
              </div>
        </div>
    </div>
  </div>

    <!--   Core JS Files   -->
  <script type="text/javascript">
    $(function() {
      $(".delbutton").click(function(){

      //Save the link in a variable called element
      var element = $(this);

      //Find the id of the link that was clicked
      var del_id = element.attr("id");

      //Built a url to send
      var info = 'id=' + del_id;
       if(confirm("Sure you want to do these? There is NO undo!"))
      		  {

       $.ajax({
         type: "GET",
         url: "delete-offence.php",
         data: info,
         success: function(){
         
         }
       });
               $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
      		.animate({ opacity: "hide" }, "slow");

       }

      return false;

      });

    });
  </script>
  <script src="{{asset('js/script.js')}}"></script>
@endsection