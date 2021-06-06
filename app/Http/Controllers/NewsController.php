<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\OurAddress;
use Illuminate\Http\Request;

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
        $this->data['ouraddress'] = OurAddress::findOrFail(1);
        $this->data['cateNews']= News::where('cat_id', '=', $id)->get();
        $this->data['categories'] = Category::all();
        return view('news.news', $this->data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function newsdetails($id)
    {
        $this->data['ouraddress'] = OurAddress::findOrFail(1);
        $this->data['news_details']= News::findOrFail($id);
        $this->data['categories'] = Category::all();
        return view('news.news', $this->data);
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
