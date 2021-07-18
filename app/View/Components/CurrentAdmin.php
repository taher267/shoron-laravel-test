<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Admin;
use App\Models\ContactUs;
use App\Models\OurAddress;
use App\Models\News;
use App\Models\Gallery;

class CurrentAdmin extends Component
{
    public $currentAdmin;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->currentAdmin = Admin::where('id', '=', session('loggedUser'))->first();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.current-admin');
    }
}
