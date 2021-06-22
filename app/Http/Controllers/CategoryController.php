<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    /**
     * Display Category listing.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageHead= "Category List";
        $categories= Category::all();
        return view('admin.category.category', compact('pageHead', 'categories'));
    }

    /**
     * Show the form for creating a new Category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $pageHead= "Category Add";
        return view('admin.category.category_create', compact('pageHead'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate( $request, [
            'category'  => 'required|string|unique:categories,category',
            'image'     => 'image|mimes:jpeg,jpg,png,gif|max:1024'
        ]);

        $image= $request->file('image');
        $slug= Str::slug($request->category);

        if ( isset($image) ) {
            //Make Unique name of Image
            $imageName = $slug . '-' . Carbon::now()->toDateString() . uniqid() . '.' . $image->getClientOriginalExtension();

            //Check Category Dir is Exists
            if ( ! Storage::disk('public')->exists('assets/category') ) {
                Storage::disk('public')->makeDirectory('assets/category');
            }

            //Resize image for Category and Upload
            $resizeImage= Image::make($image)->resize(100,100)->save(90);
            Storage::disk('public')->put('assets/category/' . $imageName, $resizeImage);
        }else{
            $imageName = 'default.png';
        }

        //data add
        $add = new Category;
        $add->category = $request->category;
        $add->slug     = $slug . '-' . Category::orderBy('id', 'desc')
                         ->first()->id+1;
        $add->image    = $imageName;
        if ($add->save()) {
            Session()->flash('msg', 'Category Has been Added!!!');
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
    {   $pageHead= "Update Category";
        $category = Category::findOrFail($id);
        return view('admin.category.category_edit', compact('category', 'pageHead'));
    }

    /**
     * Update the category.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category' => 'required|string|unique:categories,category',
            'image' => 'image|mimes:jpg,jpeg,png,gif|max:1024',
        ]);

        $image = $request->file('image');
        $slug = Str::slug($request->category);
        $category = Category::findOrFail($id);
        if (isset($image)) {
            //Make unique name of image
            $imageName = $slug . Carbon::now()->toDateString() . uniqid() . '.' . $image->getClientOriginalExtension();

            //Old image check and delete
            if (Storage::disk('public')->exists('assets/category/' . $category->image ) && $category->image != 'default.png') {
                Storage::disk('public')->delete('assets/category/' . $category->image);
            }

            //Resize image for Category and upload
            $resizeImage = Image::make($image)->resize(100,100)->save(90);
            Storage::disk('public')->put('assets/category/'.$imageName, $resizeImage);
        }else{
            $imageName = $category->image;
        }

        $unique_slug = $slug . '-' . $category->id;

        $category->category = $request->category;
        $category->slug = $unique_slug;
        $category->image = $imageName;

        if ($category->save()) {
            Session()->flash('msg', 'Category has been updated!');
            return redirect()->route('category.index');
        }
    }

    /**
     * Remove Category storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        //Delete Image
        if (Storage::disk('public')->exists('assets/category/'.$category->image) && 'default.png' != $category->image) {
            Storage::disk('public')->delete('assets/category/'.$category->image);
        }
        if ($category->delete()) {
         Session()->flash('msg', 'Category has been deleted!');
            return redirect()->back();   
        }
    }
}
