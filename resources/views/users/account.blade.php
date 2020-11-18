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
                        <h4 class="title">Update Account</h4>
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
                        <form action="{{('/account')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" name="name"  class="form-control" value="{{$userDetails->name}}" placeholder="name">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" name="email" value="{{$userDetails->email}}"  class="form-control" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="address" value="{{$userDetails->address}}" id="searchTextField" class="form-control" placeholder="Address">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Telephone</label>
                                        <input type="text" name="telephone" value="{{$userDetails->telephone}}" class="form-control" placeholder="Mobile Number">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-info btn-fill pull-right">Update Details</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="header">
                        <h4 class="title">Change Password</h4>
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
                        <form  id="passwordForm" method="post" name="passwordForm" action="{{url('/update-user-pwd')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="currentpassword">Current Password</label>
                                        <input type="password" id="current_password" name="current_password" class="form-control" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="newpassowrd">New Password</label>
                                        <input type="password" id="txtNewPassword" name="new_password"class="form-control" placeholder="Password">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="confirmpassword" >Confirm Password</label>
                                    <input type="password" id="txtConfirmPassword" name="confirm_password" class="form-control" placeholder="Confirm Password" onkeyup="checkPasswordMatch();">
                                </div>
                            </div>
                            <div class="registrationFormAlert" id="divCheckPasswordMatch"></div>

                            <button type="submit" name="passwordForm" class="btn btn-info btn-fill pull-right">Update Password</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function checkPasswordMatch() {
        var password = $("#txtNewPassword").val();
        var confirmPassword = $("#txtConfirmPassword").val();

        if (password != confirmPassword)
            $("#divCheckPasswordMatch").html("Passwords do not match!").addClass('text-danger').removeClass('text-success');

        else
            $("#divCheckPasswordMatch").html("Passwords match.").addClass('text-success').removeClass('text-danger');
    }
</script>
@endsection