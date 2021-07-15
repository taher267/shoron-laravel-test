<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\ClassDay;
use App\Models\CourseClass;
use App\Models\Gallery;
use App\Models\Home;
use App\Models\ClassTime;
use App\Models\News;
use App\Models\OurAddress;
use App\Models\Schedule;
use App\Models\Trainer;
use App\Models\Admin;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $this->data['authUser'] = Admin::where('id', '=', session('loggedUser'))->first();
        $this->data['expart_trainers']= Trainer::where('type', '=', '1')->get();
        $this->data['buildings'] = Building::all();
        $this->data['courses'] = CourseClass::all();
        $this->data['galleries'] = Gallery::all();
        $this->data['schedule'] = ClassTime::all();
        $this->data['latestNews'] = News::orderBy('id', 'desc')->where('status', '=', 1)->take(3)->get();
        $this->data['uniqueDatas'] = Home::uniqueArrForGallary();
        $this->data['ouraddress'] = OurAddress::findOrFail(1);
        $this->data['days'] = ClassDay::all();
        return view('index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
