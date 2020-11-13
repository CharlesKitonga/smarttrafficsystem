@extends('layouts.front_design')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Add an Offense</h4>
                    </div>
                    <div class="content">
					    <form  action="{{url('/add-offenses')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name of Offense</label>
                                        <input type="text" name="offense_name" class="form-control" placeholder="Offense name">
                                    </div>
                                </div>
                             </div>
                            <button type="submit" class="btn btn-info btn-fill pull-right">Add Offence</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
