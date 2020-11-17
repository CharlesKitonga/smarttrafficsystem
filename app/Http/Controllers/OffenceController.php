<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offense;
use App\ReportOffense;
use Auth;

class OffenceController extends Controller
{
    /**
     * Add a Traffic Offence.
     *
     * @return \Illuminate\Http\Response
     */
    public function addOffence(Request $request){
        
        if($request->isMethod('post')) {
            //validate the request first
            $this->validate($request, [
                'offense_name' => 'required|string|max:191',
            ]);
            $offense = new Offense;

            $offense->offense_name = $request['offense_name'];
            //dd($offense);
            $offense->save();

            return redirect('/view-traffic-offenses')->with('message', 'Offense Added Succesfully');
        }

        return view('offences.add-offences');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewTrafficOffenses(){

        $offenses = Offense::get();

        //dd($offenses);

        return view('offences.view-traffic-offenses', compact('offenses'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        
        //get all offenses to display them on the edit modal
        $offenses = Offense::get();

        $committedoffenses = ReportOffense::with('offense')->get();
        //dd($committedoffenses);
        return view('offences.view-offence', compact('user','offenses','committedoffenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        //dd($user);

        $offenses = Offense::get();
        return view('offences.report-offence', compact('offenses', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->isMethod('post')) {
            //validate the request first
            $this->validate($request, [
                'vehicle_no' => 'required|string',
                'driver_license' => 'required|string',
                'name' => 'required|string',
                'address' => 'required|string',
                'gender' => 'required|string',
                'officer_reporting' => 'required|string',
                'offense_id' => 'required|integer',
            ]);
            $reportoffense = new ReportOffense;

            $reportoffense->vehicle_no = $request['vehicle_no'];
            $reportoffense->driver_license = $request['driver_license'];
            $reportoffense->name = $request['name'];
            $reportoffense->address = $request['address'];
            $reportoffense->gender = $request['gender'];
            $reportoffense->officer_reporting = $request['officer_reporting'];
            $reportoffense->offense_id = $request['offense_id'];
            //dd($reportoffense);
            $reportoffense->save();

            return redirect('/view-committed-offenses')->with('message', 'Committed Offense Added Succesfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $offenses = Offense::findOrFail($id);

        //validate offense information
        $this->validate($request, [
            'offense_name' => 'required|string|max:191',
        ]);

        //update offenses
        $offenses->update($request->all());
        
        return redirect('/view-traffic-offenses')->with('message', 'Offense Updated Succesfully');
    }
    /**
     * Update Committed Offence Table.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function UpdateCommittedOffence(Request $request, $id)
    {
        $data = $request->all();
        //dd($data);

        $comittedOffenses = ReportOffense::findOrFail($id);
        //validate the request first
        $this->validate($request, [
            'vehicle_no' => 'required|string',
            'driver_license' => 'required|string',
            'name' => 'required|string',
            'address' => 'required|string',
            'gender' => 'required|string',
            'officer_reporting' => 'required|string',
            'offense_id' => 'required|integer',
        ]);

        //update offenses
        ReportOffense::where(['id' => $id])->update(['vehicle_no' => $data['vehicle_no'], 'driver_license' => $data['driver_license'], 'name' => $data['name'], 'address' => $data['address'], 'gender' => $data['gender'], 'officer_reporting' => $data['officer_reporting'], 'offense_id' => $data['offense_id']]);
        //dd($committedoffenses);
        
        return redirect('/view-committed-offenses')->with('message', 'Offense Updated Succesfully');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offenses = Offense::findOrFail($id);
        //delete the offenses$offenses
        $offenses->delete();
        return redirect('/view-traffic-offenses')->with('message', 'Offense Deleted Succesfully');
   
    }
     /**
     * Remove the specified offence from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function DeleteOffense($id)
    {
        $offenses = ReportOffense::findOrFail($id);
        //delete the offenses$offenses
        $offenses->delete();
        return redirect('/view-committed-offenses')->with('message', 'Offense Deleted Succesfully');
   
    }
}
