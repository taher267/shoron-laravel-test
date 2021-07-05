@extends('admin.admin_layout')
@section('main_contant')
<div class="container-fluid">
    
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"></h1>
    <p class="mb-4"></p>
        <div class="row">
            <div class="col-lg-6">
                @isset($pageHead)
                <div class="col-12"><h2 class="text-info ">{{$pageHead}}</h2></div>
                @endisset

                
                {{-- {{$asUsualData['alluser']->where('id', '=', session('loggedUser'))}} --}}
            </div>
            <div class="col-lg-6">
                <div class="d-flex flex-row-reverse"><a class="btn btn-primary mb-3 text-right text-capitalize" href="{{route('class.create')}}" title="">New class <i class="fa fa-plus"></i></a>
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot class="text-center">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Slug</th>
                        <th>Feature</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        @isset ( $classes )
                        @foreach ($classes as $class)
                        <tr class="text-center text-capitalize">
                            <td>{{ $class->title }}</td>
                            <td>{{$class->description}}</td>
                            <td>{{$class->slug}}</td>
                            <td><img class="w-50 h_100" src="{{asset('storage/assets/class/'. $class->image)}}" alt="class Feature"></td>
                            <td>
                                <a class="btn px-3" href="{{route('class.edit', $class->id)}}"><i class="fa fa-edit"></i> Edit</a>
                                {{-- Delete class --}}
                                {!! Form::open(['route' => ['class.destroy', $class->id], 'method' => 'delete']) !!}
                                <button title="{{$class->id}}" class="btn-warning btn" onclick="return confirm('Are you Sure to delete {{$class->title}}?')" type="submit"><i class="fa fa-trash"></i> Delt</button>

                                {{-- {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!} --}}

                                {!! Form::close() !!}
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