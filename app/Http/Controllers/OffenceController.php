<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offense;

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
        return view('offences.view-offence');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('offences.report-offence');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

        //validate article information
        $this->validate($request, [
            'offense_name' => 'required|string|max:191',
        ]);

        //update offenses
        $offenses->update($request->all());
        
        return redirect('/view-traffic-offenses')->with('message', 'Offense Updated Succesfully');
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
}
