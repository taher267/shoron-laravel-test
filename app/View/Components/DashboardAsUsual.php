<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Admin;
use App\Models\ContactUs;
use App\Models\OurAddress;
use App\Models\News;
use App\Models\Gallery;

class DashboardAsUsual extends Component
{
    public $dashboardAsUsualData;
    public $name;
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct($name)
    {
       $this->name = ['ABU TAHER']; 
    }



     // public function __construct($dashboardAsUsualData)
     // {
     //    $AsUsualData =[
     //        'authUser' => Admin::where('id', '=', session('loggedUser'))->first(),
     //        'contactTable' => ContactUs::all(),
     //        'ouraddress' => OurAddress::all(),
     //        'newses' => News::all(),
     //        'alluser' => Admin::all(),
     //        'gallery' => Gallery::all(),
     //    ];

     //    $this->dashboardAsUsualData = $AsUsualData;
     // }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.auth-user');
    }

    // public function format($content)
    // {
    //    return substr($content, 0, 100) . "...";
    // }
}
