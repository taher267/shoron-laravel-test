<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\ContactUs;
use App\Models\CourseClass;
use App\Models\News;
use App\Models\OurAddress;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $data = [];

//Authentication
   protected static function authUser()
    {
        return Admin::where('id', '=', session('loggedUser'))->first();
    }

//Authentication
   public static function asUsualData()
    {
        $alldata =[
            'authUser' => Admin::where('id', '=', session('loggedUser'))->first(),
            'contactTable' => ContactUs::all(),
            'ouraddress' => OurAddress::all(),
            'newses' => News::all(),
            'alluser' => Admin::all(),
        ];
        return $alldata;
        //blade print $[authUser]
    }

 /**
     * crud auth by Role and status
     * 
     * int role
     * 
     * int status
     */

    public function permission(int $role = 2, int $status = 1)
    {
        if ($this->asUsualData()['authUser']->role <=$role && $this->asUsualData()['authUser']->status ===$status) {
            return true;
        }else{
            return false;
        }
    }
   
    function get_file_extension($file_name, $slizer = '-') {
        $exploded =explode($slizer,$file_name);
        return end($exploded);
    }
}
