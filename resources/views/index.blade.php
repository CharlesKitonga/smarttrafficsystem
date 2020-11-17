@extends('layouts.front_design')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
              
    			<div class="col-md-6">
                    <div class="card">

                        <div class="header">
                            <h4 class="title">Email Statistics</h4>
                            <p class="category">Last Campaign Performance</p>
                        </div>
                        <div class="content">
                            <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>

                            <div class="footer">
                                
                                <hr>
                                <div class="stats">
    							
                                    <i class="fa fa-clock-o"></i> Welcome
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    			
    			   
                           <div class="col-md-6">
                    <div class="card ">
                        <div class="header">
                            <h4 class="title">Latest</h4>
                            <p class="category">Reported Offences</p>
                        </div>
                        <div class="content">
                            <div class="table-full-width">
                                <table class="table">
                                    <tbody>                                          
    								   <tr>
                                            <td></td>
                                            <td class="td-actions text-right">
                                              <span style="padding:2px; background-color:#1DC7EA; color:#FFF;">   </span>
                                            </td>
                                        </tr>
                                      </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
		
@endsection
     