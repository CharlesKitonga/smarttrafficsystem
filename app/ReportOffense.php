<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportOffense extends Model
{
   protected $fillable = [
   		'vehicle_no', 'driver_licence', 'name', 'address', 'gender', 'officer_reporting', 'offence_id'
   ];

   public function offense(){
   	return $this->belongsTo('App\Offense');
   }

   public function users(){

   	return $this->hasMany('App\User');
   }
}
