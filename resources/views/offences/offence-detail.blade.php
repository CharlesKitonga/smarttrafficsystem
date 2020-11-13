@extends('layouts.front_design')

@section('content')
    <div class="content">
        <div class="container-fluid">	
                <div class="row">
    				<div class="col-md-8 col-md-offset-2">
                        <div class="card">
    		                 <div class="header text-center">
                                <h4 class="title">Offense Detail</h4>
                                <br>
    							<div class="mapouter"><div class="gmap_canvas"><iframe width="650px" height="294px" 
        							id="gmap_canvas" src="https://maps.google.com/maps?q=<?php echo $row['address']; ?>
        							&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" 
        							marginwidth="0"></iframe><a href="https://www.webdesign-muenchen-pb.de"></a></div>
        							<style>.mapouter{text-align:right;height:294px;width:650px;}.gmap_canvas 
        							{overflow:hidden;background:none!important;height:294px;width:650px;}</style><small></small>
                                </div>
                            </div>
    						
                          
                            <div class="content table-responsive table-full-width table-upgrade">
    						     <table class="table">
                                    <tbody>
    								    <tr>
                                        	<td style="background-color:#3dd;">Offense:</td>
                                        	<td></td>
                                        </tr>
    								    <tr>
                                        	<td style="background-color:#3dd;">Offense ID:</td>
                                        	<td></td>
                                        </tr>
    									<tr>
                                        	<td style="background-color:#3dd;">Vehicle Reg. No:</td>
                                        	<td></td>
                                        </tr>
    									<tr>
                                        	<td style="background-color:#3dd;">Driver's Licence:</td>
                                        	<td></td>
                                        </tr>
    									<tr>
                                        	<td style="background-color:#3dd;">Name of Offender:</td>
                                        	<td></td>
                                        </tr>
    									<tr>
                                        	<td style="background-color:#3dd;">Sex of Offender:</td>
                                        	<td></td>
                                        </tr>
                                        <tr>
                                        	<td style="background-color:#3dd;">Reported By:</td>
                                        	<td></td>
                                        </tr>
    									 <tr>
                                        	<td style="background-color:#3dd;">Location of Offense:</td>
                                        	<td></td>
                                        </tr>
    									<tr>
                                        	<td style="background-color:#3dd;">Date of Offense:</td>
                                        	<td></td>
                                        </tr>
    								</tbody>
    						     </table>
    					    </div>	  
                    </div>
                </div>
            </div>
    	</div>
    </div>
@endsection
