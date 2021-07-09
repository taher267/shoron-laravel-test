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
                <div class="d-flex flex-row-reverse"><button type="button" data-toggle="modal" data-target="#newGalleryAddModal" class="btn btn-primary mb-3 text-right" href="{{route('gallery.create')}}" title="">New Photo <i class="fa fa-image"></i></button>
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
                @endif
                </h6>
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>Course</th>
                                <th>Feature</th>
                                <th>Category</th>                            <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot class="text-center">
                        <tr>
                            <th>Course</th>
                            <th>Feature</th>
                            <th>Category</th>                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                            @isset ( $dashboardData['gallery'] )
                            @foreach ($dashboardData['gallery'] as $photo)
                            <tr class="text-center text-capitalize">
                                <td title="{{ $photo->id}}">{{ $photo->galcourse->title }}</td>
                                <td><img class="w-50 h_100" src="{{asset(($photo->image)?'storage/assets/gallery/'. $photo->image:'')}}" alt="photo Feature"></td>
                                <td class="text-normal">{{$photo->cat_id}}</td>
                                
                                <td>
                                    <button {{($permission || $dashboardData["authUser"]->id == $photo->added_by)? '' : 'disabled' }} type="button" class="btn btn-primary" data-toggle="modal" data-target="#galleryEditModal"><i class="fa fa-edit"></i> Edit</button>
                                    {!! Form::open(['route' => ['gallery.destroy', $photo->id], 'method' => 'DELETE']) !!}
                                        <button onclick='return {{(($permission  && $dashboardData["authUser"]->role == 1) || $dashboardData["authUser"]->id == $photo->id)?'confirm("Are you Sure to Delete the'. $photo->galcourse->title.'")' : 'false' }}'  type="submit" class="btn"><i class="fa fa-trash"></i> Delete</button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>

                            {{--Edit Modal  start --}}
                            <div class="modal fade" id="galleryEditModal" tabindex="-1" aria-labelledby="galleryEditModalLabel{{$photo->id}}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="galleryEditModalLabel{{$photo->id}}">Edit info of {{$photo->galcourse->title}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            {!! Form::model($photo, [ 'route' => ['gallery.update', $photo->id], 'method' => 'PUT' , 'enctype' => "multipart/form-data" ]) !!}
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="fas fa-arrow-right text-primary"></i><sup class="text-danger">*</sup></span>
                                                {!! Form::select('course_id', $classes, null, ['class' => 'form-control text-capitalize', 'placeholder' => 'Select Class']) !!}
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="fas fa-image text-primary"></i></span>
                                                @if (isset($photo->image) )
                                                <span class="input-group-text">
                                                    <img style="width:28px" id="up_image_{{$photo->id}}" src="{{asset('storage/assets/gallery/' . $photo->image)}}">
                                                </span>
                                                @endif

                                                {!! Form::file('image', ['class' => 'form-control', 'accept'=>"image/*", 'onchange'=>"loadFile$photo->id(event)"]) !!}
                                                <img >
                                                
                                            </div>
                                            <script>
                                              var loadFile{{$photo->id}} = function(event) {
                                                var output_{{$photo->id}} = document.getElementById('up_image_{{$photo->id}}');
                                                output_{{$photo->id}}.src = URL.createObjectURL(event.target.files[0]);
                                                output_{{$photo->id}}.onload = function() {
                                                  URL.revokeObjectURL(output_{{$photo->id}}.src) // free memory
                                                }
                                              };
                                            </script>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="fas fa-arrow-right text-primary"></i><sup class="text-danger">*</sup></span>
                                                {!! Form::select('cat_id', $classes, null, ['class' => 'form-control ']) !!}
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="fab fa-get-pocket text-primary"></i><sup class="text-danger">*</sup></span>
                                                {!! Form::select('status', ['0' => 'Draft', '1' => 'Publish'], null, ['class' => 'form-control ']) !!}
                                            </div>
                                            <div class="modal-footer">
                                                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                                {{--Edit Modal  end --}}
                                
                                @endforeach
                                @endisset
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{--Add new Modal start --}}
        <div class="modal fade" id="newGalleryAddModal" tabindex="-1" aria-labelledby="newGalleryAddModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newGalleryAddModalLabel">Add New Photo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {!! Form::open([ 'route' => 'gallery.store', 'method' => 'POST' , 'enctype' => "multipart/form-data" ]) !!}
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-arrow-right text-primary"></i><sup class="text-danger">*</sup></span>
                            {!! Form::select('course_id', $classes, null, ['class' => 'form-control text-capitalize', 'placeholder' => 'Select Class']) !!}
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-image text-primary"></i></span>
                            {!! Form::file('image', ['class' => 'form-control ']) !!}
                            
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-arrow-right text-primary"></i><sup class="text-danger">*</sup></span>
                            {!! Form::select('cat_id', $classes, null, ['class' => 'form-control ', 'placeholder' => 'Select Ctegory']) !!}
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fab fa-get-pocket text-primary"></i><sup class="text-danger">*</sup></span>
                            {!! Form::select('status', ($dashboardData['authUser']->role <=2)?['0' => 'Draft', '1' => 'Publish']:['0' => 'Draft'], null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Add Phote</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            {{--Add new Modal end --}}
            @stop