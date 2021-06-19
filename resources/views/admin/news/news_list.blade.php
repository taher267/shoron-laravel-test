@extends('admin.admin_layout')
@section('main_contant')
<div class="container-fluid">
    
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p>
        <div class="row">
            <div class="col-lg-6">
                @isset($pageHead)
                <div class="col-12"><h2 class="text-info ">{{$pageHead}}</h2></div>
                @endisset
            </div>
            <div class="col-lg-6">
                <div class="d-flex flex-row-reverse"><a class="btn btn-primary mb-3 text-right" href="{{route('news.create')}}" title="">Add news <i class="fa fa-plus"></i></a>
            </div>
        </div>
        
    </div>
    
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">@if(session('msg'))
    <div class="alert alert-primary">
        {{session('msg')}}
    </div>
    @endif</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Slug</th>
                            <th>Feature</th>
                            <th>Cat_id</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot class="text-center">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Slug</th>
                        <th>Feature</th>
                        <th>Cat_id</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        @isset ( $newslist )
                        @foreach ($newslist as $news)
                        <tr class="text-center text-capitalize">
                            <td>{{ $news->title }}</td>
                            <td>{{$news->description}}</td>
                            <td>{{$news->slug}}</td>
                            <td><img class="w-50 h_100" src="{{asset('storage/assets/news/'. $news->image)}}" alt="News Feature"></td>
                            <td>{{$news->cat_id}}</td>
                            <td>
                                <a class="btn px-3" href="{{route('news.edit', $news->slug)}}"><i class="fa fa-edit"></i> Edit</a>
                                <a class="btn px-3" href="{{$news->id}}"><i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        @endisset
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop