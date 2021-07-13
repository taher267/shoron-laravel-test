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
                <div class="d-flex flex-row-reverse">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addTagModal"><i class="fa fa-plus"></i> Add Tag</button>
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
                                <th>Tag</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot class="text-center">
                        <tr>
                            <th>Tag</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                            @isset ( $tags )
                            @foreach ($tags as $tag)
                            <tr class="text-center text-capitalize">
                                <td>{{ $tag->title }}</td>
                                <td>
                                    <a class="btn px-3" href="{{route('tag.edit', $tag->id)}}"><i class="fa fa-edit"></i> Edit</a>
                                    {{-- Delete tag --}}
                                    {!! Form::open(['route' => ['tag.destroy', $tag->id], 'method' => 'delete']) !!}
                                    <button title="{{$tag->tag }}" class="btn-danger btn" onclick="return confirm('Are you Sure to delete {{$tag->tag}}?')" type="submit"><i class="fa fa-trash"></i> Delt</button>
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
        <!-- Modal -->
        <div class="modal fade" id="addTagModal" tabindex="-1" aria-labelledby="addTagModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addTagModalLabel">Add Tag</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {!! Form::open(['route' => 'tag.store']) !!}
                    <div class="modal-body">
                         @if ($errors->any())
                            @foreach ($errors->all() as $err)
                                <div class="alert alert-danger">{{$err}}</div>
                            @endforeach
                        @endif 
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-heading text-primary"></i></span>
                            {!! Form::text('title', NULL, ['class' => 'form-control ', 'placeholder' => 'New Tag title']) !!}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="input-group mb-3">
                            
                            {!! Form::submit('Add Tag', ['class' => 'form-control btn btn-primary']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    @stop