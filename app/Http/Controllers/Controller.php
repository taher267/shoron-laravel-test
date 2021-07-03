<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\CourseClass;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $data = [];

//
   protected static function authUser()
    {
        return Admin::where('id', '=', session('loggedUser'))->first();
    }

    function get_file_extension($file_name, $slizer = '-') {
        $exploded =explode($slizer,$file_name);
        return end($exploded);
    }
}
