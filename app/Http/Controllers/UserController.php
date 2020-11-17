<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        A user cannot be elevated to superadmin, so only retrieve the customer and admin roles for editing.
        */
        $roles = Role::where('id', '>', '1')->get();
        $users = User::orderByDesc('created_at')->paginate(10);
        return view('users.view-users')->with([
            'users' => $users,
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $roles = Role::where('id', '>', '1')->get();
        return view('users.add-user')->with([
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->telephone = $request->telephone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role_id;
        //dd($user);
        
        $user->save();

        return redirect('/user');
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
        $data = $request->all();
        //dd($data);

        $comittedOffenses = User::findOrFail($id);
        //validate the request first
        $this->validate($request, [
            'name' => 'required|string',
            'telephone' => ['required', 'numeric', 'digits_between:10,13'],
            'email' => 'required|email',
            'role_id' => 'required|integer',
        ]);

        //update offenses
        User::where(['id' => $id])->update(['name' => $data['name'], 'telephone' => $data['telephone'],'email' => $data['email'], 'role_id' => $data['role_id']]);
        //dd($committedoffenses);
        
        return redirect('/user')->with('message', 'User Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
