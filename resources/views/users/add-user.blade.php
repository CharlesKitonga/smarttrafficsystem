@extends('layouts.front_design')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Add User</h4>
                    </div>
                    <div class="content">
                        <form action="{{('/add-user')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" name="name"  class="form-control" placeholder="name" required="">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" name="email"  class="form-control" placeholder="Email" required="">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="password" name="pass"  class="form-control" placeholder="Password" required="">
                                </div>
                            </div>

                            <div class="row">
                            
                               
								  <div class="col-md-4">
                                    <div class="form-group">
                                        <label>User Type</label>
                                        <select class="form-control" name="role_id"  >
                                        @foreach($roles as $role)
                                          <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach  
                                        </select> 
                                    </div>
                                </div>
                               
                            </div>
                            <button type="submit" class="btn btn-info btn-fill pull-right">Create User</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection