<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;
use Auth;


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
    public function Account(Request $request)
    {
        $user_id = Auth::User()->id;
        $userDetails = User::find($user_id);
        //echo "<pre>";print_r($userDetails);die;
       
       if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>";print_r($data);die;
 
            $user = User::find($user_id);
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->telephone = $data['telephone'];
            $user->address = $data['address'];
            //dd($user);
            $user->save();

            return redirect()->back()->with('flash_message_success','Your Account Details have been Updated Succesfully');
       }
        return view('users.account', compact('userDetails'));
    }
    public function updateUserPassword(Request $request){
        $user_id = Auth::User()->id;
        $userDetails = User::find($user_id);

        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>";print_r($data);die;
            $old_password = User::where('id',Auth::User()->id)->first();
            $current_password = $data['current_password'];
            if (Hash::check($current_password,$old_password->password)) {
                 //update password
                $new_password = bcrypt($data['new_password']);
                if ($new_password != $data['confirm_password']) {
                    return redirect('/update-user-pwd')->with('flash_message_error','Your Passwords do not Match!');
                }else{
                    User::where('id', Auth::User()->id)->update(['password'=>$new_password]);
                    return redirect('/update-user-pwd')->with('flash_message_success','Password Updated Succesfully!'); 
                }
                
            }else{
                return redirect('/update-user-pwd')->with('flash_message_error','Incorrect Current Password!');
            }

        }

        return view('users.account', compact('userDetails'));
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
