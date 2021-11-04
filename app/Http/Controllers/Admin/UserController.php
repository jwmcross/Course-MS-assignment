<?php

namespace App\Http\Controllers\Admin;

use App\Mail\NewUser;
use App\Staff;
use App\User;
use App\Role;
use Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{

    private $staff;

    public function __construct(Staff $staff)
    {
        $this->middleware('auth');
        $this->staff = $staff;
    }

    /**
     * Display a listing of the resource.
     *

     */
    public function index( User $user, Staff $staff )
    {

        $users = User::all();

        return view('admin.user_table')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {

        $user = new User();
        $user->password = Str::random(8);

        $roles = Role::all();

        return view('auth.user_create', compact('user', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function createStaff( Request $request, Staff $staff )
    {
        if(User::where('staff_id',$staff->id)->exists()) {
            $request->session()->flash('warning','User Account Already Exists');
            return $this->showNonUsers();
        }

        $username = strtolower(substr($staff->firstname,0,1).$staff->surname);

        $checkUsername = User::where('username',$username)->get()->toArray();
        if(count($checkUsername)>0)
            $username .= count($checkUsername)+1;

        $user = new User();
        $user->username = $username;
        $user->password = Str::random(8);

        $roles = Role::all();

        return view('auth.user_create_staff', compact('user', 'roles', 'staff'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {

        $request->validate([
            'username'=>'required|unique:users,username',
            'password'=>'required|min:8',
        ]);

        $user = User::create([
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
        ]);

        $user->roles()->sync($request->roles);

        if($user->save())
            $request->session()->flash('success', 'Successfully created User Account');
        else
            $request->session()->flash('error', 'An Error Occurred when adding new user.');

        return redirect()->route('admin.users.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function storeStaff(Request $request, Staff $staff)
    {

        $request->validate([
            'username'=>'required|unique:users,username',
            'password'=>'required|min:8',
        ]);

        $user = User::create([
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
            'staff_id' => $staff->id
        ]);

        $user->roles()->sync($request->roles);

        if($user->save())
            $request->session()->flash('success', 'Successfully created User Account for '. $staff->firstname.' '.$staff->surname);
        else
            $request->session()->flash('error', 'An Error Occurred when adding new user.');


        //Mail::to($staff->email)->send(new NewUser($staff, $user, $request->input('password')));

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(Gate::denies('manage-users')){
            redirect()->route('dashboard');
        }
        $roles = Role::all();

        return view('admin.user_edit')->with([
            'roles' => $roles,
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $user->roles()->sync($request->roles);
        $user->username = $request->username;

        if($user->save()) {
            $request->session()->flash('success', 'User "'.$user->username. '" updated successfully');
        }
        else {
            $request->session()->flash('error', 'An Error occured when Updating User');
        }

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(Gate::denies('manage-users')){
            redirect()->route('dashboard');
        }
        $user->roles()->detach();
        $user->delete();

        return redirect()->route('admin.users');
    }

    public function showProfile()
    {
        $user = Auth::User();

        return view('user.user_profile', compact('user'));
    }

    public function showNonUsers()
    {
        //Get all the users current in the users table
        $ids = User::all()->pluck('staff_id')->toArray();

        $arr = array_filter($ids, function($u){
           return  $u != null;
        });

        //If there are no users, make a default array of IDs of 0. DB doesnt contains id 0
        //Will prevent where in query on null.
        //--Get all the staff id that have a user account
        if(count($ids)===0 || empty($arr) ) $ids = array(0=>'0');
        else $ids = $arr;


        //Find all the staff that do not have a user account. By Searching the staff id against the ones in the users table
        //Returning all the negative results,
        $staff_arr = Staff::whereNotIn('id', $ids)->get();

        //$users = Staff::findNotUser();
        return view('admin.notuser_table', compact('staff_arr'));

    }

    public function resetPassword( User $user )
    {
        Hash::make(str_random(8));


    }

}
