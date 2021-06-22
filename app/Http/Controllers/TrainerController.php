<?php

namespace App\Http\Controllers;

use App\Models\OurAddress;
use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function index()
    {   
        $this->data['ouraddress'] = OurAddress::findOrFail(1);
        $this->data['trainers'] = Trainer::all();
        return view('trainers.trainer', $this->data);
    }

   
}