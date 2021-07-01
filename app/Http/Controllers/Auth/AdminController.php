<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\OurAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        $pageHead = 'Login Here';
        $ouraddress = OurAddress::findOrFail(1);
        return view( 'auth.login',compact('pageHead', 'ouraddress') );
    }

    /**
     * Check Trying login info.
     *
     * @return \Illuminate\Http\Response
     */
    public function check(Request $request)
    {
        $this->validate( $request, [
            'email'  => 'required|email',
            'password'  => 'required|min:8|max:32',
        ]);

        $userInfo = Admin::where( 'email', '=', $request->email)->first();
        if ( !$userInfo ) {
            return back()->with('fail', 'We do not recognize your email address!');
        }else{
            //check password
            if (Hash::check($request->password, $userInfo->password)) {
                $request->session()->put('loggedUser', $userInfo->id );
                return redirect()->intended('dashboard');
            }else{
                return back()->with('fail', 'Incorrect Password!');
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        $pageHead = 'Register Here!';
        $ouraddress = OurAddress::findOrFail(1);
        return view( 'auth.register',compact('pageHead', 'ouraddress') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $this->validate($request,[
            'name'  => 'required|string',
            'email'  => 'required|email|unique:admins',
            'password'  => 'required|min:8|max:32',
            'confirmPass'  => 'required',
        ]);

        //Insert Data into Database
        $admin              = new Admin;
        $admin->name        = $request->name;
        $admin->email       = $request->email;
        $admin->password    = Hash::make($request->password);
        if ($admin->save()) {
            return back()->with('success', 'New use has been successfully Added!');
        }else{
            return back()->withErrors('fail', "Something went wrong, please try again later!");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        if(session()->has('loggedUser')){
            session()->pull('loggedUser');
            return redirect()->route('auth.login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageHead = 'User List';
        return view('admin.admin.admin', compact('pageHead'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store($id)
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
        //
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
