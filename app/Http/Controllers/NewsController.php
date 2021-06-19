<?php

namespace App\Http\Controllers;


use App\Http\Requests\NewsRequest;
use App\Models\Category;
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
        $this->data['ouraddress'] = OurAddress::findOrFail(1);
        $this->data['newses'] = News::all();
        $this->data['categories'] = Category::all();
        return view('news.news', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['headeing']='News page';
        $this->data['categories']=Category::categoriesListArr();
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
         $insertNews->cat_id        = $request->cat_id;
         $insertNews->date          = Carbon::now()->format('M-d-Y');
         $insertNews->slug          = $slug;
         $insertNews->image         = $imageName;
         $insertNews->save();

         Session()->flash('msg', "News Has been added!!");
         return redirect()->route('news.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $this->data['ouraddress'] = OurAddress::findOrFail(1);
        return $this->data['cateNews']= News::where('slug', $slug)->get();

        // return $this->data['cateNews']= News::where('cat_id', '=', $id)->get();
        $this->data['categories'] = Category::all();
        return view('news.news', $this->data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function newsdetails($slug)
    {
        $this->data['ouraddress'] = OurAddress::findOrFail(1);
        $this->data['news_details']= News::where('slug', $slug)->get();
        // $this->data['news_details']= News::findOrFail($id);
        $this->data['categories'] = Category::all();
        // return $this->data;
        return view('news.news', $this->data);
    }

    /**
     *Display News listing of the resource for dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function newslist()
    {
        $this->data['pageHead'] = 'News List';
        $this->data['newslist'] = News::all();

        // $this->data['categories'] = Category::all();
        return view('admin.news.news_list', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
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
        $this->validate($request, [
            'title'         => 'required|',
            'description'   => 'string|nullable',
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
             $currentData = Carbon::now()->toDateString();

             $imageName = $up_slug . '-' . $currentData . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

             //check news dir is exists
             if (!Storage::disk('public')->exists('assets/news')) {
                 Storage::disk('public')->makeDirectory('assets/news');
             }
             // var_dump($news_up[0]->image); exit();
             //delete old news image
             if (Storage::disk('public')->exists('assets/news/' . $news_up[0]->image)) {
                 Storage::disk('public')->delete('assets/news/' . $news_up[0]->image);
             }

             //resize image for news and upload
             $resizeNews = Image::make($image)->resize(1600,500)->save(90);
             Storage::disk('public')->put('assets/news/' . $imageName, $resizeNews);
         }else{
            $imageName = $news_up[0]->image;
         }
         
         $update = [
            'title'         => $request->title,
            'description'   => $request->description,
            'cat_id'        => $request->cat_id,
            'date'          => Carbon::now()->format('M-d-Y'),
            'slug'          => $up_slug,
            'image'         => $imageName,
         ];

         // update query using slug
         if ( News::where('slug', $slug)->update($update) ) {
             Session()->flash('msg', "News Has been Updated!!");
             return redirect()->route('news.edit', $up_slug);
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
        //
    }
}
