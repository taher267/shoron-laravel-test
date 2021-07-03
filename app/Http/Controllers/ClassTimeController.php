<?php

namespace App\Http\Controllers;

use App\Http\Requests\TimeRequest;
use App\Models\CourseClass;
use App\Models\ClassDay;
use App\Models\ClassTime;
use App\Models\Trainer;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ClassTimeController extends Controller
{
    /**
     * Display a listing of the Schedule resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['authUser'] = Admin::where('id', '=', session('loggedUser'))->first();;
        $this->data['days'] = ClassDay::arrDayForSchedule();
        $this->data['pageHead'] = 'Class Time';
        $this->data['schedule'] = ClassTime::all();
        return view('admin.time.time', $this->data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['pageHead'] = 'Class Time Add ';
        $this->data['authUser'] = Admin::where('id', '=', session('loggedUser'))->first();
        $this->data['classes'] = CourseClass::arrClassForSchedule();
        $this->data['trainers'] = Trainer::arrTrainersForSchedule();
        $this->data['days'] = ClassDay::arrDayForSchedule();
        return view('admin.time.time_create', $this->data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TimeRequest $request)
    {
        $timeData = $request->all();
        if (ClassTime::create($timeData)) {
            
            Session::flash('msg', 'Day has been Added!!!');
        }
        return redirect()->route('time.create');
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
