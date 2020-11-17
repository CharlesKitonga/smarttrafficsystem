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
                          <h4 class="title">Offences Table</h4>
                          <p class="category">Here is a list of all Offences</p>
                      </div>
                      @if(session('message'))
                          <p style="color: green; float: right; margin-top: -20px;">
                              {{session('message')}}
                          </p>
                      @endif
                      <div class="content table-responsive table-full-width">
				
            							 <label for="filter"></label><input type="text" name="filter" value="" id="myInput" placeholder="Search with Offense Name" onkeyup="myFunction()"/>
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
                          <table class="table table-hover table-striped" id="myTable">
                              <thead>
                                <th>Offence ID</th>
                              	<th>Offence</th>
							                  <th>Action</th>
                              </thead>
                              <tbody>
                                @foreach($offenses as $offense)
                                <tr>
                                   <td>{{$offense->id}}</td>
                                   <td>{{$offense->offense_name}}</td>
                                   <td>
                                      <a data-target="#editModal{{$offense->id}}" data-toggle="modal">
                                        <i class="fa fa-edit text-blue fa-lg"></i>
                                      </a>
                                      &nbsp&nbsp&nbsp&nbsp&nbsp

                                      <a href="{{ url('/delete_offense/'.$offense->id)}}" ><i class="fa fa-trash fa-lg text-danger"></i></a>
                                    
                                    </td>
                                 </tr>
                                  <!-- Edit Offense Modal -->
                                  <div class="modal fade" id="editModal{{$offense->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Edit offense</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <form id="edittopic{{$offense->id}}" method="post" action="{{url('/editoffense/'.$offense->id)}}">
                                              @csrf
                                              @method('PUT')
                                              <div class="modal-body">
                                                 <div class="form-group">
                                                    <label for="offense_name">Offense Name</label>
                                                    <input type="text" name="offense_name" id="offense_name" value=" {{$offense->offense_name}}" class="form-control @error('offense_name') is-danger @enderror" value="{{ old('offense_name') }}" required="">
                                                     @error('offense_name')
                                                        <p class="help is-danger">{{$errors->first('offense_name')}}</p>
                                                    @enderror
                                                </div>
                                              </div>
                                            </form>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" form="edittopic{{$offense->id}}" class="btn btn-primary">Save changes</button>
                                            </div>
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