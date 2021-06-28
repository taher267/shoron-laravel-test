<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CourseClass;
use App\Models\OurAddress;
use Illuminate\Http\Request;

class CourseClassController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageHead = 'All Classes';
        $classes= CourseClass::all()->sortByDesc('id');
        return view('admin.class.class_list', compact('classes', 'pageHead'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        // $this->data['ouraddress'] = OurAddress::findOrFail(1);
        // $this->data['class_details']= CourseClass::findOrFail($id);
        // $this->data['categories'] = Category::all();
        // return view('course.course', $this->data);
    }

     

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function category($id)
    {
        $this->data['ouraddress'] = OurAddress::findOrFail(1);
        $this->data['cateclass']= CourseClass::where('type', '=', $id)->get();
        $this->data['categories'] = Category::all();
        return view('course.course', $this->data);
    }
    public function edit($id)
    {
        $pageHead = 'New Class';
        $class = CourseClass::findOrFail($id);
        return view('admin.class.class_edit', compact('class', 'pageHead'));
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


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function classes()
    {
        $this->data['ouraddress'] = OurAddress::findOrFail(1);
        $this->data['courses']= CourseClass::all();
        return view('course.course', $this->data);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function classdetails($id)
    {
        $this->data['ouraddress'] = OurAddress::findOrFail(1);
        $this->data['class_details']= CourseClass::findOrFail($id);
        $this->data['categories'] = Category::all();
        return view('course.course', $this->data);
    }
}
