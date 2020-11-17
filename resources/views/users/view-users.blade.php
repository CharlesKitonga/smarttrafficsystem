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
                              &nbsp&nbsp&nbsp
                              <a href="{{url('/add-user/create')}}" class="btn btn-info" role="button">Add User</a>
                              <thead>
                                <th>#</th>
                                <th>Name</th>
                                <th>Phone Number</th>
                              	<th>Email</th>
                              	<th>Role</th>
							                  <th>Action</th>
                              </thead>
                              <tbody>
                                @foreach($users as $user)
                                 <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->telephone }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->roles->name }}</td>
                                    <td>
                                       <a data-target="#editModal{{$user->id}}" data-toggle="modal">
                                        <i class="fa fa-edit text-blue fa-lg"></i>
                                      </a>
                                      &nbsp&nbsp&nbsp&nbsp&nbsp

                                      <a href="{{ url('/delete_user/'.$user->id)}}" ><i class="fa fa-trash fa-lg text-danger"></i></a>
                                    </td>
                                 </tr>
                                  <!-- Edit Report Offense Modal -->
                                  <div class="modal fade" id="editModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Edit User</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <form method="post" action="{{url('/edit-user/'.$user->id)}}">
                                              @csrf
                                              @method('PUT')
                                              <div class="modal-body">
                                                  <div class="form-group">
                                                      <label for="Name">Full Name</label>
                                                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autofocus>

                                                      @error('name')
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                      </span>
                                                      @enderror
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="telephone">Telephone</label>
                                                      <input id="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ $user->telephone }}" required autofocus>

                                                      @error('telephone')
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                      </span>
                                                      @enderror
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="Email">Email</label>
                                                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                                      @error('email')
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                      </span>
                                                      @enderror
                                                  </div>
                                                  <div class="form-group">
                                                    <label>Role</label>
                                                    <select class="form-control" name="role_id" >
                                                        @foreach($roles as $role)
                                                            <option value="{{$user->id}}"  @if($user->role_id == $role->id) checked @endif
                                                             @if($user->role_id == 1)
                                                            disabled
                                                            @endif>{{$role->name}}
                                                          </option>
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
