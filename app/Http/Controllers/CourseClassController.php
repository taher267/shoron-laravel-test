<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\ClassTime;
use App\Models\CourseClass;
use App\Models\OurAddress;
use App\Models\Trainer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

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
        $asUsualData = $this->asUsualData();
        $classes= CourseClass::all()->sortByDesc('id');
        return view('admin.class.class_list', compact('classes', 'pageHead', 'asUsualData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageHead = 'Add New Class';
        $classtime  = ClassTime::classTimesArr();
        $trainer    = Trainer::arrTrainersForSchedule();
        return view('admin.class.class_create', compact('pageHead', 'classtime', 'trainer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'         => 'required|string',
            'description'   => 'string|nullable',
            'class_time'        => 'numeric|nullable',
            'trainer'        => 'numeric|nullable',
            'image'         => 'image|mimes:jpeg,png,jpg',

        ]);

        //get form image
        $image = $request->file('image');

        //return 
        $slug = Str::slug($request->title);

         if (isset($image)) {
            //make unique name of image
             $imageName = $slug . '-' . Carbon::now()->toDateString() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

             //check class dir is exists
             if ( !Storage::disk('public')->exists('assets/class') ) {
                 Storage::disk('public')->makeDirectory('assets/class');
             }

             //Resize image for class and upload
             $resizeclass = Image::make($image)->resize(360,246)->save(90);
             Storage::disk('public')->put('assets/class/' . $imageName, $resizeclass);
         }else{
            $imageName = 'default.png';
         }
        
         //Random Slug for unique 

         date_default_timezone_set('Asia/Dhaka');
        
            $new_class = new CourseClass;
            $new_class->title    = strtolower($request->title);
            $new_class->description       = $request->description;
            $new_class->trainer          = $request->trainer;
            $new_class->class_time       = $request->class_time;
            $new_class->date             = Carbon::now()->format('d M Y');
            $new_class->slug             = $slug. "-". CourseClass::orderBy('id', 'desc')->first()->id+1;
            $new_class->time             = date("h:i:s", time());
            $new_class->image            = $imageName;
            // return $new_class ;
         // update query using slug
         if ( $new_class->save() ) {
             Session()->flash('msg', "Class Has been Added!!");
             return redirect()->back();
             }   
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
       $pageHead    = 'Edit Class';
        $class      = CourseClass::findOrFail($id);
        $classtime  = ClassTime::classTimesArr();
        $trainer    = Trainer::arrTrainersForSchedule();

        return view('admin.class.class_edit', compact('class', 'trainer', 'classtime', 'pageHead'));
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
        $this->validate($request, [
            'title'         => 'required|string',
            'description'   => 'string|nullable',
            'class_time'        => 'numeric|nullable',
            'trainer'        => 'numeric|nullable',
            'image'         => 'image|mimes:jpeg,png,jpg',

        ]);

        //get form image
        $image = $request->file('image');

        //return 
        $up_slug = Str::slug($request->title);

       $class_up = CourseClass::findOrFail($id);

         if (isset($image)) {
            //make unique name of image
             $imageName = $up_slug . '-' . Carbon::now()->toDateString() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

             //delete old class image
             if (Storage::disk('public')->exists('assets/class/' . $class_up->image) && $class_up->image != 'default.png' ) {
                // return 'Yes';
                 Storage::disk('public')->delete('assets/class/' . $class_up->image);
             }

             //check class dir is exists
             if (!Storage::disk('public')->exists('assets/class')) {
                 Storage::disk('public')->makeDirectory('assets/class');
             }

             //Resize image for class and upload
             $resizeclass = Image::make($image)->resize(360,246)->save(90);
             Storage::disk('public')->put('assets/class/' . $imageName, $resizeclass);
         }else{
            $imageName = $class_up->image;
         }
        
         //Random Slug for unique 

         date_default_timezone_set('Asia/Dhaka');
        
         
            $class_up->title    = strtolower($request->title);
            $class_up->description       = $request->description;
            $class_up->trainer          = $request->trainer;
            $class_up->class_time       = $request->class_time;
            $class_up->date             = Carbon::now()->format('d M Y');
            $class_up->slug             = $up_slug . "-". $class_up->id;
            $class_up->time             = date("h:i:s", time());
            $class_up->image            = $imageName;

         // update query using slug
         if ( $class_up->save() ) {
             Session()->flash('msg', "Class Has been Updated!!");
             return redirect()->back();
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
        $del_class = CourseClass::findOrFail($id);

     //delete class image
     if (Storage::disk('public')->exists('assets/class/' . $del_class->image) && $del_class->image != 'default.png' ) {
        // return 'Yes';
         Storage::disk('public')->delete('assets/class/' . $del_class->image);
     }

     if ( $del_class->delete() ) {
        Session()->flash('msg', "Class has been deleted!!!");
        return redirect()->back(); 
     }
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
    public function classdetails($slug)
    {
        $this->data['ouraddress'] = OurAddress::findOrFail(1);
        $this->data['class_details']= CourseClass::where('slug', $slug)->get();
        $this->data['class_categories'] = Category::all();
        return view('course.course_details', $this->data);
    }

    /**
     * Display Classes category wise.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function categoryclasses($category)
    {

        $this->data['ouraddress'] = OurAddress::findOrFail(1);
        $category_id                 = Category::where('slug', $category)->get();
        $this->data['cateClass']   = CourseClass::where('build_id', '=', $category_id[0]->id)->where('status', '=', '1')
                                    ->get();
        $this->data['class_categories'] = Category::all();

        return view('course.category_course', $this->data);
    }

    /**
     * Display Class details category wise.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function categoryclassdetails($category, $slug)
    {

        $this->data['ouraddress'] = OurAddress::findOrFail(1);
        $category                 = Category::where('slug', $category)->get();
        
        $this->data['class_details']   = CourseClass::where('slug', $slug)
                                    ->where('status', '=', '1')
                                    ->get();
        $this->data['news_categories'] = Category::all();
        
        return view('course.course_details', $this->data);
    }

}
