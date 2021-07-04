<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminRole;
use App\Models\OurAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

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
     * Display a login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard(){
        $pageHead = 'Dashboard';
        $asUsualData = $this->asUsualData();
        $authUser = Admin::where('id', '=', session('loggedUser'))->first();
        $ouraddress = OurAddress::findOrFail(1);
        return view( 'admin.day.day',compact('pageHead', 'ouraddress', 'authUser', 'asUsualData') );
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
                // return $userInfo->status;
                if ($userInfo->status) {
                    $request->session()->put('loggedUser', $userInfo->id );
                return redirect()->intended('dashboard');
                }else{
                    return back()->with('fail', 'Your Acount Under Authorize, please wait max 72hrs!');
                }
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
            'password'  => 'required|min:5|max:15',
            'confirm_password'  => 'required_with:password|same:password|min:5|max:15',
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
        $authUser = Admin::where('id', '=', session('loggedUser'))->first();
        $users = Admin::all();
        return view('admin.admin.admin', compact('pageHead', 'users', 'authUser'));
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
     * Edit user Info
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageHead= "Edit User";
        $authUser = Admin::where('id', '=', session('loggedUser'))->first();
        $roles =AdminRole::rolesArrForUser();
        $user = Admin::findOrFail($id);
        return view('admin.admin.admin_edit', compact('pageHead', 'user', 'roles', 'authUser'));
    }

    /**
     * Update user info
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $authUser = Admin::where('id', '=', session('loggedUser'))->first();
        
        // check status and role
        $tryingupdate = Admin::findOrFail($id);
        if ($authUser->status ==1 && ($authUser->sup_admin ==1 || $authUser->role <=2) ) {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',//:unique:admins
            'role' => 'required|numeric',
            'status' => 'required|numeric',
            'image' => 'image|mimes:jpg,jpeg,png|max:1024',
        ]);
        
        $image = $request->file('image');

        $userInfo = Admin::findOrFail($id);
        if (isset($image)) {
            //Make unique name of image
            $imageName = Str::slug($request->name) . Carbon::now()->toDateString() . uniqid() . '.' . $image->getClientOriginalExtension();

            //Old image check and delete
            if (Storage::disk('public')->exists('assets/user/' . $userInfo->image ) && $userInfo->image != 'avater.png') {
                Storage::disk('public')->delete('assets/user/' . $userInfo->image);
            }

            //Make dir, not exist
            if (!Storage::disk('public')->exists('assets/user')) {
                Storage::disk('public')->makeDirectory('assets/user');
            }

            //Resize image for Category and upload
            $resizeImage = Image::make($image)->resize(100,100)->save(90);
            Storage::disk('public')->put('assets/user/'.$imageName, $resizeImage);
        }else{
            $imageName = $userInfo->image;
        }
       
        $userInfo->name = $request->name;
        $userInfo->email = $request->email;
        $userInfo->status = $request->status;

        $userInfo->role = $request->role;

        $userInfo->image = $imageName;

        $userInfo->sup_admin = ($tryingupdate->role ==1 && $tryingupdate->sup_admin==1)? '1':'0';
        // $userInfo->sup_admin = ($id== session('loggedUser'))? 1:0;
        $userInfo->approved_by = $authUser->id;
        // return $userInfo; exit();
        if ( $userInfo->save() ) {
            return back()->with('msg', 'User has been updated!');
        }

        }//check Auth id
        else{
            return back()->with('msg', "You shold be Admin");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $authUser = Admin::where('id', '=', session('loggedUser'))->first();
        $user = Admin::findOrFail($id);
        
        $countsupAdmin =  count(Admin::where('sup_admin', '=', 1 )->get());

        //$user->sup_admin ===0 && $user->role >1 && $authUser->role<3 && $authUser->status ===1 && $authUser->id != $user->id
        if ( $authUser->role >2 ||  ($user->sup_admin ==1 && $countsupAdmin ==1 )) {
            return back()->with('msg', 'Something went wrong or it\'s your own id!');
            
        }elseif($id == $authUser->id){
                return back()->with('msg', 'You can\'t delete your own account!');
            }else{
           //Delete Image
                if (Storage::disk('public')->exists('assets/user/'.$user->image) && 'avater.png' != $user->image) {
                    Storage::disk('public')->delete('assets/user/'.$user->image);
                }
                if ($user->delete()) {
                    return back()->with('msg', 'User has been deleted!');   
                } 
        }
        
    }
}
