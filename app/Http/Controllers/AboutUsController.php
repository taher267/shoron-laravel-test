<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    /**
     * Return index Page
     */
    public function index()
    {   
         $this->data['ouraddress'] = \App\Models\OurAddress::findOrFail(1);
        return view('about', $this->data);
    }
}
