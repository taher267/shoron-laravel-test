<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Models\Category;
use App\Models\Admin;
use App\Models\NewsTag;
use App\Models\News;
use App\Models\Tag;
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
     * Display a listing of newses for Main menu/menu.
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
     * Show the form for creating a new News in Dashboard.
     * Upto author can create new news
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ($this->permission(4)) {
            $this->data['pageHead']     ='News page';
            $this->data['asUsualData']  = $this->asUsualData();
            $this->data['categories']   =Category::categoriesListArr();
            $this->data['tags']   =Tag::tagsArr();
            return view('admin.news.news_create', $this->data);   
        }else{
            return back()->with('msg', 'You have to be Author, Min');
        }
       
        
    }

    /**
     * Store a newly created News in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * News adding permission up to author
     */
    public function store(Request $request)
    {
        //check Authentication
        if ($this->permission(4) ) {
            //input validation

        $this->validate($request, [
            'title'         => 'required',
            'description'   => 'string|nullable',
            'tag_id'        => 'nullable',
            'cat_id'        => 'numeric|nullable',
            'image'         => 'image|mimes:jpeg,png,jpg',
        ]);
        //get form image
        $image = $request->file('image');
        $slug = Str::slug($request->title);
        //unique slug
        if ( ! News::where('slug', $slug)->get()->first() ) {
            $unique_slug = $slug;
        }else{
            $unique_slug = $slug. "-". News::orderBy('id', 'desc')->first()->id+1;
        }
        
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
         $insertNews->posted_by   = $this->dashboardData()['authUser']->id;
         $insertNews->approved_by   = ($this->dashboardData()['authUser']->role <=2)?$this->dashboardData()['authUser']->id :0;

         $insertNews->cat_id        =($request->cat_id) ? $request->cat_id:'0';   
         $insertNews->date          = Carbon::now()->format('M-d-Y');
        $insertNews->slug           = $unique_slug;
         $insertNews->image         = $imageName;

         if ( $insertNews->save() ) {
           $newsAttach = News::findOrFail(News::orderBy('id', 'desc')->first()->id);
           //tag adding
           $newsAttach->tags()->sync($request->tag_id);
                         
         Session()->flash('msg', "News Has been added!!");
         return redirect()->route('news.create');
         }

         }else{
            return back()->with('msg', "You must be admin!"); 
        }

    }
    /**
     * News Tags update
     */
    public function updateTags(Request $request, $id)
    {
        //check Authentication
        if ($this->permission(4) ) {
            $newsTagUp = News::findOrFail($id);
            //delete Tags
            if ($request->tag_id == '') {
                $newsTagUp->tags()->detach();
                return back()->with('msg', "All Tag has been added!");
            }else{
                //input validation
                $this->validate($request, [
                    'tag_id'        => 'required|array',
                ]);
                $tags = $request->tag_id;
                sort($tags);
                
                $newsTagUp->tags()->sync($tags);
                    return back()->with('msg', "Tag has been added!");
                }
            }
                
    }

    /**
     * Display the specified news useing slug for single news.
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
        $this->data['asUsualData'] = $this->asUsualData();
        $this->data['tags']         =Tag::all();
        $this->data['tagsarr']         =Tag::tagsArr();

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
            $news_status_up                 = News::findOrFail($id);
            $news_status_up->approved_by    = $this->asUsualData()['authUser']->id;
            $news_status_up->status         = $request->status;

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
        $checkNews = News::where('slug', $slug)->get()->first();
        if ($this->permission() || $this->dashboardData()['authUser']->slug == $checkNews->slug ) {
            $this->data['pageHead']     ='Edit News';
            $this->data['news_edit']    = News::where('slug', $slug)
                                                ->get()->first();
            $this->data['categories']   =Category::categoriesListArr();
            // $this->data['tags']         =Tag::tagsArr();
            $this->data['tags']         =Tag::all();
            return view('admin.news.news_edit', $this->data);
        }else{
            return route('news.list')->with('msg', 'Have to be admin');
        }
        
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
        // return $slug;
         //check Authentication
        $checkNews = News::where('slug', $slug)->get()->first();
        // return $checkNews->id;
        if ($this->permission() || $this->dashboardData()['authUser']->slug == $checkNews->slug ) {
            $news_up    = News::where('slug', $slug)->get()->first();
            //input validation
            $this->validate($request, [
                'title'         => 'required|',
                'description'   => 'string|nullable',
                'cat_id'        => 'numeric|nullable',
                'tag_id'        => 'nullable|array',
                'image'         => 'image|mimes:jpeg,png,jpg|max:1024',
            ]);

        //get form image
        $image      = $request->file('image');
        $up_slug    = Str::slug($request->title);
        
        //new slug exist on another post
        $newSlugCheck = News::where('slug', $up_slug)->get()->first();
        
       //unique slug
        if ( ! $newSlugCheck || $news_up->id == $newSlugCheck->id) {
            //going to take previous slug
            $unique_slug = $checkNews->slug;

        }else{
            //slug exist table creating new slug
            $unique_slug = $checkNews->slug . "-" . News::orderBy('id', 'desc')->first()->id;
        }

         if (isset($image)) {
            //make unique name of image
             $imageName = $up_slug . '-' . Carbon::now()->toDateString() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

             //check news dir is exists
             if (!Storage::disk('public')->exists('assets/news')) {
                 Storage::disk('public')->makeDirectory('assets/news');
             }
             // var_dump($news_up[0]->image); exit();
             //delete old news image
             if (Storage::disk('public')->exists('assets/news/' . $news_up->image) && $news_up->image != 'default.png' ) {
                 Storage::disk('public')->delete('assets/news/' . $news_up->image);
             }

             //Resize image for news and upload
             $resizeNews = Image::make($image)->resize(1600,500)->save(90);
             Storage::disk('public')->put('assets/news/' . $imageName, $resizeNews);
         }else{
            $imageName = $news_up->image;
         }
        
         //Random Slug for unique 

         $update = [
            'title'         => $request->title,
            'description'   => $request->description,
            'cat_id'        => ($request->cat_id) ? $request->cat_id:'0',
            'date'          => Carbon::now()->format('M-d-Y'),
            'slug'          => $unique_slug,
            'image'         => $imageName,
         ];
         
         // update query using slug
         if ( $checkNews->update($update) ) {
            //Update Tags
            if ($request->tag_id =="") {// delete tag
                $checkNews->tags()->detach($request->tag_id);
            }else{// 
                $tags = $request->tag_id;
                sort($tags);
                $checkNews->tags()->sync($tags);
            }
             Session()->flash('msg', "News Has been Updated!!");
             return redirect()->route('news.edit', $unique_slug);
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
        $checkNews = News::where('slug', $slug)->get()->first();
        if ($this->permission() || $this->dashboardData()['authUser']->slug == $checkNews->slug ) {
        //check the post image exists
        if (Storage::disk('public')->exists('assets/news/' . $checkNews->image)) {
            Storage::disk('public')->delete('assets/news/' . $checkNews->image);
        }
        
        if (News::where('slug', $slug)->delete()) {
            // delete tag
                $checkNews->tags()->detach();
            
            Session()->flash('msg', 'News Has been deleted!!');
            return redirect()->back();
        }
    }else{
        return back()->with('msg', 'You are not elligible to delete this!');
    }

    }//end destroy
}
