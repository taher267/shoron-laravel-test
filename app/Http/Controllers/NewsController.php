<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Models\Category;
use App\Models\Admin;
use App\Models\News;
use App\Models\OurAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;


class NewsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asUsualData = $this->asUsualData();
        $this->data['ouraddress'] = OurAddress::findOrFail(1);
        $this->data['newses'] = News::all();
        $this->data['news_categories'] = Category::all();
        return view('news.news', $this->data, compact('asUsualData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->data['authUser']     = $this->asUsualData()['authUser'];

        $this->data['headeing']     ='News page';
        $this->data['asUsualData']  = $this->asUsualData();
        $this->data['categories']   =Category::categoriesListArr();
        return view('admin.news.news_create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //check Authentication
        if ($this->asUsualData()['authUser']->role <=4 && $this->asUsualData()['authUser']->status ===1 ) {
            //input validation

        $this->validate($request, [
            'title'         => 'required|',
            'description'   => 'string|nullable',
            'description'   => 'string|nullable',
            'cat_id'        => 'numeric|nullable',
            'image'         => 'image|mimes:jpeg,png,jpg|max:1024',
        ]);
        //get form image
        $image = $request->file('image');
        $slug = Str::slug($request->title);
        //////////////
        // $is_exist_in_new_table= News::where('slug', $slug)->get();
        //return 
        // $only_slug = News::all();
        // $arr =[];
        // foreach($only_slug as $slug){
        //     $arr[$slug->id]=$slug->slug;
        // }
        // var_dump($arr);
        //return array_count_values($arr);

        // exit();
        // if ($is_exist_in_new_table) {
        //     $str =$is_exist_in_new_table[0]->slug;
        //     // print_r($str); exit();

        //     $exist = $this->get_file_extension($str);
        //     print_r($exist); exit();
        // }
        // else{return "no";}
        // return $slug; exit();
        ////////////////////////
         if (isset($image)) {
            //make unique name of image
             $currentData = Carbon::now()->toDateString();
             $imageName = $slug . '-' . $currentData . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

             //check news dir is exists
             if (!Storage::disk('public')->exists('assets/news')) {
                 Storage::disk('public')->makeDirectory('assets/news');
             }

             //resize image for news and upload
             $resizeNews = Image::make($image)->resize(1600,500)->save(90);
             Storage::disk('public')->put('assets/news/' . $imageName, $resizeNews);
         }else{
            $imageName = 'default.png';
         }

         $insertNews = new News();        

         $insertNews->title         = $request->title;
         $insertNews->description   = $request->description;
         $insertNews->cat_id        =($request->cat_id) ? $request->cat_id:'0';   
         $insertNews->date          = Carbon::now()->format('M-d-Y');
        $insertNews->slug           = $slug. "-". News::orderBy('id', 'desc')->first()->id+1;
         $insertNews->image         = $imageName;
         // return $insertNews;
         $insertNews->save();

         Session()->flash('msg', "News Has been added!!");
         return redirect()->route('news.create');
         }else{
            return back()->with('msg', "You must be admin!"); 
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($details)
    {
     
        $this->data['ouraddress'] = OurAddress::findOrFail(1);
        $this->data['news_details']= News::where('slug', $details)
                        ->where('status', '=', '1')
                        ->get();;
        // $this->data['news_details']= News::findOrFail($id);
        $this->data['news_categories'] = Category::all();
        // return $this->data;
        return view('news.news_details', $this->data);   

    }

    /**
     * Display Newses category wise.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function categorynews($category)
    {
		
        $this->data['authUser']  = Admin::where('id', '=', session('loggedUser'))->first();
        $this->data['ouraddress'] = OurAddress::findOrFail(1);
        $category_id                 = Category::where('slug', $category)->get();
        $this->data['cateNews']   = News::where('cat_id', '=', $category_id[0]->id)->where('status', '=', '1')
                                    ->get();
        $this->data['news_categories'] = Category::all();

        return view('news.category_news', $this->data);
    }

    /**
     * Display News details category wise.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function categorynewsdetails($catslug, $details)
    {

        $this->data['ouraddress'] = OurAddress::findOrFail(1);
        $category                 = Category::where('slug', $catslug)->get();
        
        $this->data['cateNewsDetails']   = News::where('cat_id', '=', $category[0]->id)
                                    ->where('status', '=', '1')
                                    ->get();
        $this->data['news_categories'] = Category::all();
        
        // echo '<pre>';
        // var_dump($cateNews);
        // echo '</pre>';
        return view('news.category_news_details', $this->data);
    }

    /**
     *Display News listing of the resource for dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function newslist()
    {
        
        $this->data['pageHead'] = 'All News';
        $this->data['newslist'] = News::all();

        // $this->data['categories'] = Category::all();
        $this->data['asUsualData'] = $this->asUsualData();

        return view('admin.news.news_list', $this->data);
    }
    
    /**
     *Display Pandding News Update OR News Status update for dashboard.
     *
     * @return \Illuminate\Http\Response
     * this->permission from Controller.php
     * @param int $role, int $status
     */
    public function statusupdate(Request $request, $id)
    {
        //check Authentication
        if ( $this->permission() ) {
            //input validation
            $this->validate($request, [
                'status'        => 'required|numeric'
            ]);
           $news_status_up = News::findOrFail($id);
        $news_status_up->approved_by = $this->asUsualData()['authUser']->id;
           $news_status_up->status = $request->status;
           if ( $news_status_up->save() ) {
                 return back()->with('status', "News Status Has been Updated!!~~$id");
             }else{
              return back()->with('status', "News Status Hasn't been Updated!!");  
             }

        }else{
            return back()->with('msg', "You must be admin!"); 
        }

    }

    
/**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        
        $this->data['headeing']='Edit News';
        $this->data['news_edit']= News::where('slug', $slug)->get();
        $this->data['categories']=Category::categoriesListArr();
        return view('admin.news.news_edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  str  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
         //check Authentication
        if ($this->asUsualData()['authUser']->role <=2 && $this->asUsualData()['authUser']->status ===1 ) {
            //input validation
        $this->validate($request, [
            'title'         => 'required|',
            'description'   => 'string|nullable',
            'cat_id'        => 'numeric|nullable',
            'image'         => 'image|mimes:jpeg,png,jpg|max:1024',
        ]);

        //get form image
        $image = $request->file('image');

        //return 
        $up_slug = Str::slug($request->title);

        // $news_up = News::findOrFail($id); //exit();
       $news_up = News::where('slug', $slug)->get();

         if (isset($image)) {
            //make unique name of image
             $imageName = $up_slug . '-' . Carbon::now()->toDateString() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

             //check news dir is exists
             if (!Storage::disk('public')->exists('assets/news')) {
                 Storage::disk('public')->makeDirectory('assets/news');
             }
             // var_dump($news_up[0]->image); exit();
             //delete old news image
             if (Storage::disk('public')->exists('assets/news/' . $news_up[0]->image) && $news_up[0]->image != 'default.png' ) {
                 Storage::disk('public')->delete('assets/news/' . $news_up[0]->image);
             }

             //Resize image for news and upload
             $resizeNews = Image::make($image)->resize(1600,500)->save(90);
             Storage::disk('public')->put('assets/news/' . $imageName, $resizeNews);
         }else{
            $imageName = $news_up[0]->image;
         }
        
         //Random Slug for unique 

         $rand_slug = $up_slug . "-". $news_up[0]->id;
         $update = [
            'title'         => $request->title,
            'description'   => $request->description,
            'cat_id'        => ($request->cat_id) ? $request->cat_id:'0',
            'date'          => Carbon::now()->format('M-d-Y'),
            'slug'          => $rand_slug,
            'image'         => $imageName,
         ];
         // return $update; exit();

         // update query using slug
         if ( News::where('slug', $slug)->update($update) ) {
             Session()->flash('msg', "News Has been Updated!!");
             return redirect()->route('news.edit', $rand_slug);
             }
        }else{
            return back()->with('msg', "You must be admin!"); 
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $news =  News::where('slug', $slug)->get();

        //check the post image exists
        if (Storage::disk('public')->exists('assets/news/' . $news[0]->image)) {
            Storage::disk('public')->delete('assets/news/' . $news[0]->image);
        }
        
        if (News::where('slug', $slug)->delete()) {
            Session()->flash('msg', 'News Has been deleted!!');
            return redirect()->back();
        }


    }
}
