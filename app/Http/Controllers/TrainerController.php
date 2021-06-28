<?php

namespace App\Http\Controllers;

use App\Models\ClassTime;
use App\Models\OurAddress;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageHead = 'Trainer List';
        $trainers = Trainer::all()->sortByDesc('id');
        return view('admin.trainer.trainer_list', compact('pageHead', 'trainers'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageHead = 'New Trainer';
        $classtime = ClassTime::classTimesArr();
        return view('admin.trainer.trainer_create', compact('pageHead','classtime'));
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
            'name' => 'required|string',
            'trainer_image' => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
            'class_time_id' => 'required|string',
        ]);

        $image = $request->file('trainer_image');

        if (isset($image)) {
            //Make unique name of image
            $imageName = Str::slug($request->name) . uniqid() . '.' . $image->getClientOriginalExtension();

            //Make Dir for is exists
            if ( ! Storage::disk('public')->exists('assets/trainer') ) {
                Storage::disk('public')->makeDirectory('assets/trainer');
            }

            //Resize image for trainer and upload
            $resizeImage = Image::make($image)->resize(400,400)->save(90);
            Storage::disk('public')->put('assets/trainer/'.$imageName, $resizeImage);
        }else{
            $imageName = 'default.png';
        }

        //Data add
        $trainer = new Trainer;
        $trainer->name = $request->name;
        $trainer->trainer_image = $imageName;
        $trainer->class_time_id = $request->class_time_id;
       
        if ($trainer->save()) {
            Session()->flash('msg', 'Trainer has been Added!');
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trainer = Trainer::findOrFail($id);
        $pageHead = 'Edit Trainer';
        $classtime = ClassTime::classTimesArr();
        return view('admin.trainer.trainer_edit', compact('pageHead','classtime', 'trainer'));
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
            'name' => 'required|string',
            'trainer_image' => 'nullable|image|mimes:jpg,jpeg,png|max:400',
            'class_time_id' => 'required|string',
        ]);

        $image = $request->file('trainer_image');
        $trainer = Trainer::findOrFail($id);

        if (isset($image)) {
            //Make unique name of image
            $imageName = Str::slug($request->name) . uniqid() . '.' . $image->getClientOriginalExtension();

            //Old image check and delete
            if (Storage::disk('public')->exists('assets/trainer/' . $trainer->trainer_image ) && $trainer->trainer_image != 'default.png') {
                Storage::disk('public')->delete('assets/trainer/' . $trainer->trainer_image);
            }

            //Make Dir for is exists
            if ( ! Storage::disk('public')->exists('assets/trainer') ) {
                Storage::disk('public')->makeDirectory('assets/trainer');
            }

            //Resize image for trainer and upload
            $resizeImage = Image::make($image)->resize(400,400)->save(90);
            Storage::disk('public')->put('assets/trainer/'.$imageName, $resizeImage);
        }else{
            $imageName = $trainer->trainer_image;
        }

        $trainer->name = $request->name;
        $trainer->trainer_image = $imageName;
        $trainer->class_time_id = $request->class_time_id;
       
        if ($trainer->save()) {
            Session()->flash('msg', 'Trainer has been updated!');
            return redirect()->route('trainer.index');
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
        $del_trainer= Trainer::findOrFail($id);

        //Image delete if exist
        if (Storage::disk('public')->exists('assets/trainer/' . $del_trainer->trainer_image) && 'default.png' != $del_trainer->trainer_image) {
            Storage::disk('public')->delete('assets/trainer/' . $del_trainer->trainer_image);
        }
        
        //delete trainer & confirmation
        if ($del_trainer->delete()) {
            Session()->flash('msg', 'Trainer has been deleted!!!');
            return redirect()->back();
        }
    }

    /**
     * Display a listing of the Trainers for Menu.
     *
     * @return \Illuminate\Http\Response
     */
    public function trainers()
    {   
        $this->data['ouraddress'] = OurAddress::findOrFail(1);
        $this->data['trainers'] = Trainer::all();
        return view('trainers.trainer', $this->data);
    }

}
